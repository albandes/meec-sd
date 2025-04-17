# Habilitando WebSocket no Mosquitto para Conexão com Navegador (MQTT.js)

Este guia mostra como configurar o Mosquitto para aceitar conexões WebSocket (usadas pelo navegador) **sem impactar a conexão MQTT padrão (porta 1883)**.

---

## ✅ 1. Editar o arquivo de configuração do Mosquitto

Abra o arquivo de configuração do Mosquitto:

```bash
sudo nano /etc/mosquitto/mosquitto.conf
```

Ou crie um novo:

```bash
sudo nano /etc/mosquitto/conf.d/websocket.conf
```

Adicione:

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
  - Origem: `0.0.0.0/0`

---

## ✅ 3. Reiniciar o Mosquitto

```bash
sudo systemctl restart mosquitto
```

---

## ✅ 4. Conectar via navegador

No HTML:

```js
const client = mqtt.connect("ws://SEU_IP:9001");
```

---

## ✅ Exemplo de configuração final

```conf
listener 1883
protocol mqtt

listener 9001
protocol websockets

allow_anonymous true
```

---

## 🧠 Observação

Browsers **não conseguem usar** MQTT na porta 1883 via TCP.  
Para usar MQTT.js no navegador, você **precisa de WebSocket** (`ws://` ou `wss://`).

---
**Mestrado em Engenharia Eletrônica e Computação – UCPel**  
Dr. Rogério Albandes, Ph.D. in Computer Science · [Voltar para o README](../README.md)