# Integração da Página IoT com ESP8266 usando Tasmota e MQTT (2 Lâmpadas)

Este guia mostra como configurar um ESP8266 com firmware Tasmota para controlar **duas lâmpadas (LEDs)** via interface web usando MQTT.

---

## 🧩 Tópicos utilizados pela página HTML

| Ação                        | Tópico                             | Mensagem     |
|-----------------------------|------------------------------------|--------------|
| Enviar comando para lâmpada 1 | `iot/sd/tasmota_67D824/cmnd/Power1`           | `on` ou `off` |
| Receber status da lâmpada 1  | `iot/sd/tasmota_67D824/stat/POWER1`            | `on` ou `off` |
| Enviar comando para lâmpada 2 | `iot/sd/tasmota_67D824/cmnd/Power2`           | `on` ou `off` |
| Receber status da lâmpada 2  | `iot/sd/tasmota_67D824/stat/POWER2`            | `on` ou `off` |

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

- **Host**: IP_SEU_BROKER 
- **Port**: `1883`
- **Client**: `meec-sd`
- **Topic**: `tasmota_%06X`
- **Full Topic**: `iot/sd/%topic%/%prefix%/`

> O `%topic%` será substituído por `tasmota_67D824` (dependendo do MAC address da Esp), gerando:
> - Comando: `iot/sd/tasmota_67D824/cmnd/Power1`
> - Status:  `iot/sd/tasmota_67D824/stat/POWER1`, etc.

---

## ⚙️ Opção: Ajustar JavaScript para usar tópicos padrão do Tasmota

Você pode adaptar o código JS para publicar em:

```js
client.publish("iot/sd/tasmota_67D824/cmnd/Power1", "ON");
client.publish("iot/sd/tasmota_67D824/cmnd/Power2", "OFF");
```

E assinar os status:

```js
client.subscribe("iot/sd/tasmota_67D824/stat/POWER1");
client.subscribe("iot/sd/tasmota_67D824/stat/POWER2");
```

---

**Mestrado em Engenharia Eletrônica e Computação – UCPel**  
Dr. Rogério Albandes, Ph.D. in Computer Science · [Voltar para o README](../README.md)
