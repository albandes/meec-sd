# Integração da Página IoT com ESP8266 usando Tasmota e MQTT (2 Lâmpadas)

Este guia mostra como configurar um ESP8266 com firmware Tasmota para controlar **duas lâmpadas (LEDs)** via interface web usando MQTT.

---

## 🧩 Tópicos utilizados pela página HTML

| Ação                        | Tópico                             | Mensagem     |
|-----------------------------|------------------------------------|--------------|
| Enviar comando para lâmpada 1 | `iot/lampada/1/comando`           | `on` ou `off` |
| Receber status da lâmpada 1  | `iot/lampada/1/status`            | `on` ou `off` |
| Enviar comando para lâmpada 2 | `iot/lampada/2/comando`           | `on` ou `off` |
| Receber status da lâmpada 2  | `iot/lampada/2/status`            | `on` ou `off` |

---

## ✅ Configurando o Tasmota

### 1. Atribuir GPIOs aos relés

No menu **Configuration → Configure Module**, configure:

- GPIO4 → `Relay1` (para Lâmpada 1)
- GPIO5 → `Relay2` (para Lâmpada 2)

Salve e o dispositivo reiniciará.

---

### 2. Configurar MQTT

Vá em **Configuration → Configure MQTT**:

- **Host**: IP do seu broker (ex: `54.235.114.156`)
- **Port**: `1883`
- **Client**: `lampadas01`
- **Topic**: `lampadas01`
- **Full Topic**: `iot/lampada/%topic%/%prefix%/`

> O `%topic%` será substituído por `lampadas01`, gerando:
> - Comando: `iot/lampada/lampadas01/cmnd/POWER1`
> - Status:  `iot/lampada/lampadas01/stat/POWER1`, etc.

---

## ⚙️ Opção: Ajustar JavaScript para usar tópicos padrão do Tasmota

Você pode adaptar o código JS para publicar em:

```js
client.publish("iot/lampada/lampadas01/cmnd/POWER1", "ON");
client.publish("iot/lampada/lampadas01/cmnd/POWER2", "OFF");
```

E assinar os status:

```js
client.subscribe("iot/lampada/lampadas01/stat/POWER1");
client.subscribe("iot/lampada/lampadas01/stat/POWER2");
```

---

**Mestrado em Engenharia Eletrônica e Computação – UCPel**  
Dr. Rogério Albandes, Ph.D. in Computer Science · [Voltar para o README](../README.md)
