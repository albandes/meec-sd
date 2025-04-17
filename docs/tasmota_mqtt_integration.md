# Integração da Página IoT com ESP8266 usando Tasmota e MQTT

Este guia mostra como configurar um dispositivo Tasmota (ESP8266) para funcionar com a página de controle via MQTT.

---

## 🧩 Tópicos utilizados na página HTML

| Ação                        | Tópico                            | Mensagem     |
|-----------------------------|-----------------------------------|--------------|
| Enviar comando ligar/desligar | `iot/lampada/1/comando`           | `on` ou `off` |
| Receber status da lâmpada     | `iot/lampada/1/status`            | `on` ou `off` |

---

## ✅ Configurando o Tasmota

1. Acesse o IP do dispositivo Tasmota
2. Vá em **Configuration → Configure MQTT**
3. Configure assim:

- **Host**: IP do seu broker (ex: `54.235.114.156`)
- **Port**: `1883`
- **Client**: `lampada1`
- **Topic**: `lampada1`
- **Full Topic**: `iot/lampada/1/%prefix%/`

---

## ⚙️ Solução 1: Ajustar HTML para usar tópicos do Tasmota

No JS:

```js
client.publish("iot/lampada/1/cmnd/POWER", "ON");
client.subscribe("iot/lampada/1/stat/POWER");
```

---

## ⚙️ Solução 2: Usar regras no Tasmota para traduzir os tópicos

No console do Tasmota:

```tasmota
Rule1 ON mqtt#iot/lampada/1/comando DO Power %value% ENDON
Rule1 1
Rule2 ON Power#State DO Publish iot/lampada/1/status %value% ENDON
Rule2 1
```

---

## ✅ Conclusão

| Abordagem         | Vantagem                             |
|-------------------|---------------------------------------|
| Ajustar HTML      | Simples, ideal para teste e aula      |
| Regras no Tasmota | HTML permanece padrão, mais escalável |

---
**Mestrado em Engenharia Eletrônica e Computação – UCPel**  
Dr. Rogério Albandes, Ph.D. in Computer Science · [Voltar para o README](../README.md)