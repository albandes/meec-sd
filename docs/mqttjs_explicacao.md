# Explicação do JavaScript com MQTT.js

## 📦 Conexão com o broker

```js
const client = mqtt.connect("ws://SEU_BROKER:9001");
```

> Usa WebSocket (não TCP MQTT direto)

## 📤 Envio de comando

```js
client.publish("iot/lampada/1/comando", "on");
```

## 📥 Recebimento de status

```js
client.on("message", (topic, message) => {
  if (topic === "iot/lampada/1/status") {
    // Atualiza o status visualmente
  }
});
```

## ✅ Como instalar o MQTT.js

Já é usado via CDN:

```html
<script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
```
---
**Mestrado em Engenharia Eletrônica e Computação – UCPel**  
Dr. Rogério Albandes, Ph.D. in Computer Science · [Voltar para o README](../README.md)