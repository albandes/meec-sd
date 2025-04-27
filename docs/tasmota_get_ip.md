
# Como Solicitar o Endereço IP de um Dispositivo Tasmota via MQTT

## 1. Descrição

Para solicitar o endereço IP (e outras informações de rede) de um dispositivo **Tasmota** via **MQTT**, você deve:

- Publicar o comando `Status 5` no tópico de comando do dispositivo.
- Escutar a resposta no tópico de status.

## 2. Publicar o Comando

Se o tópico do seu dispositivo for:

```text
iot/sd/tasmota_67D824/
```

Então o comando para pedir o status de rede será:

```bash
mosquitto_pub -h <BROKER_IP> -t "iot/sd/tasmota_67D824/cmnd/Status" -m "5"
```

> **Substitua `<BROKER_IP>` pelo IP do seu servidor MQTT**.

## 3. Escutar a Resposta

Abra um terminal para escutar todos os tópicos relacionados ao dispositivo:

```bash
mosquitto_sub -h <BROKER_IP> -t "iot/sd/tasmota_67D824/#" -v
```

A resposta virá no tópico:

```text
iot/sd/tasmota_67D824/stat/STATUS5
```

E terá um conteúdo semelhante a:

```json
{
  "StatusNET": {
    "Hostname": "tasmota_67D824",
    "IPAddress": "192.168.1.123",
    "Gateway": "192.168.1.1",
    "Subnetmask": "255.255.255.0",
    ...
  }
}
```

O campo `IPAddress` é o endereço IP atual do dispositivo.

## 4. Exemplo em Python (paho-mqtt)

Você também pode fazer isso via Python usando a biblioteca `paho-mqtt`:

```python
import paho.mqtt.client as mqtt

BROKER = "<BROKER_IP>"
TOPIC_COMMAND = "iot/sd/tasmota_67D824/cmnd/Status"
TOPIC_RESPONSE = "iot/sd/tasmota_67D824/stat/STATUS5"

def on_message(client, userdata, msg):
    print(f"Mensagem recebida no tópico {msg.topic}:")
    print(msg.payload.decode())

client = mqtt.Client()
client.on_message = on_message

client.connect(BROKER)
client.subscribe(TOPIC_RESPONSE)

# Publica o pedido de Status 5
client.publish(TOPIC_COMMAND, "5")

client.loop_forever()
```

> **Nota:** Não esqueça de instalar o `paho-mqtt`:
> ```bash
> pip install paho-mqtt
> ```
---

**Mestrado em Engenharia Eletrônica e Computação – UCPel**  
Dr. Rogério Albandes, Ph.D. in Computer Science · [Voltar para o README](../README.md)