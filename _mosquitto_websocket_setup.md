# Habilitando WebSocket no Mosquitto para Conexão com Navegador (MQTT.js)

Este guia mostra como configurar o Mosquitto para aceitar conexões WebSocket (usadas pelo navegador) **sem impactar a conexão MQTT padrão (porta 1883)**.

---

## ✅ 1. Editar o arquivo de configuração do Mosquitto

### Se você usa `/etc/mosquitto/mosquitto.conf`:

Adicione ao final:

```conf
listener 9001
protocol websockets

allow_anonymous true
```

### Ou crie um novo arquivo:

```bash
sudo nano /etc/mosquitto/conf.d/websocket.conf
```

Com o conteúdo:

```conf
listener 9001
protocol websockets

allow_anonymous true
```

---

## ✅ 2. Liberar a porta 9001 no firewall ou EC2

### Em servidor local:

```bash
sudo ufw allow 9001/tcp
```

### Em instância EC2 da AWS:

- Vá até **Security Groups**
- Adicione uma **nova regra**:
  - Tipo: Custom TCP
  - Porta: `9001`
  - Origem: `0.0.0.0/0` (ou IP da sua rede)

---

## ✅ 3. Reiniciar o Mosquitto

```bash
sudo systemctl restart mosquitto
```

---

## ✅ 4. Usar conexão WebSocket no navegador

No `index.html` da sua página:

```js
const client = mqtt.connect("ws://54.278.124.59:9001");
```

Teste no console do navegador:

```js
const client = mqtt.connect("ws://54.278.124.59:9001");
client.on("connect", () => console.log("✅ Conectado com sucesso"));
client.on("error", (err) => console.error("❌ Erro:", err));
```

---

## ⚙️ Exemplo de configuração completa (segura e funcional)

```conf
# Conexão MQTT padrão (TCP/IP)
listener 1883
protocol mqtt

# Conexão via WebSocket (navegador)
listener 9001
protocol websockets

# Liberado para testes (não recomendado em produção)
allow_anonymous true
```

---

## ✅ O que vai funcionar:

| Cliente                       | Porta | Protocolo         | Funciona? |
|------------------------------|-------|-------------------|-----------|
| `mosquitto_pub`, `mosquitto_sub` | 1883  | MQTT TCP/IP       | ✅         |
| Navegador com `mqtt.js`      | 9001  | WebSocket (`ws://`) | ✅         |

---

## 🚫 Observação

Navegadores **não conseguem** conectar diretamente via TCP/IP na porta 1883.  
Eles precisam usar **WebSocket** (`ws://` ou `wss://`) para comunicação com brokers MQTT.

---

Pronto! Agora seu Mosquitto aceita conexões tanto de scripts locais quanto de páginas HTML usando `mqtt.js`.

---

**Mestrado em Engenharia Eletrônica e Computação – UCPel**  
Dr. Rogério Albandes, Ph.D. in Computer Science · [Voltar para o README](../README.md)