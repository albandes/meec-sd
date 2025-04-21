
# 🌐 Tutorial: Gravando o Firmware Tasmota na ESP8266

Este tutorial mostra como gravar o firmware **Tasmota** em placas com **ESP8266**, como NodeMCU, Wemos D1 Mini ou ESP-01.

---

## 🧠 Pré-requisitos

1. **ESP8266** (NodeMCU, Wemos D1 Mini ou ESP-01 com adaptador USB/serial)
2. **Cabo USB** ou adaptador USB-Serial com fios jumper
3. **Firmware Tasmota** (arquivo `.bin`)
4. **Gravador**: Tasmotizer ou `esptool.py`
5. **Driver do conversor USB-Serial** (CH340G, CP2102 ou FTDI)

---

## 🔌 Instalar o Driver do Conversor USB-Serial

### 🔹 Descubra o chip do seu adaptador USB-Serial
Os mais comuns são:
- **CH340G**
- **CP2102**
- **FT232R**

### 🪟 Windows

#### CH340G
- Baixe: [http://www.wch.cn/download/CH341SER_EXE.html](http://www.wch.cn/download/CH341SER_EXE.html)
- Execute o instalador como administrador

#### CP2102
- Baixe: [https://www.silabs.com/developers/usb-to-uart-bridge-vcp-drivers](https://www.silabs.com/developers/usb-to-uart-bridge-vcp-drivers)

#### FTDI
- Baixe: [https://ftdichip.com/drivers/vcp-drivers/](https://ftdichip.com/drivers/vcp-drivers/)

### 🍎 macOS

- **CH340G**: [Driver atualizado](https://github.com/adrianmihalko/ch340g-ch34g-ch34x-mac-os-x-driver)
- **CP2102/FTDI**: Use os sites oficiais

⚠️ Pode ser necessário liberar nas "Preferências de Segurança e Privacidade"

### 🐧 Linux

- Drivers geralmente já inclusos no kernel
- Verifique com: `dmesg | grep tty`
- Porta aparecerá como `/dev/ttyUSB0`, `/dev/ttyUSB1`, etc.

---

## 🔧 Etapas do Processo

### ✅ Passo 1 – Baixar o Firmware do Tasmota

- Link: [https://github.com/arendst/Tasmota/releases](https://github.com/arendst/Tasmota/releases)
- Baixe `tasmota.bin` (ou `tasmota-lite.bin`)

### ✅ Passo 2 – Instalar o Tasmotizer

- Baixe: [https://github.com/tasmota/tasmotizer](https://github.com/tasmota/tasmotizer)
- Windows: baixe o `.exe`
- Linux: `pip install tasmotizer`

### ✅ Passo 3 – Conectar a ESP8266 ao PC

#### NodeMCU ou Wemos D1 Mini
- Conecte via cabo USB

#### ESP-01 com adaptador
```
USB-Serial    ESP-01
----------------------
TX       --> RX
RX       --> TX
GND      --> GND
3.3V     --> VCC e CH_PD
GPIO0    --> GND (modo flash!)
```

### ✅ Passo 4 – Flash com Tasmotizer

1. Abra o Tasmotizer
2. Escolha a **porta COM**
3. Clique em **Browse** e selecione `tasmota.bin`
4. Marque “Erase Flash” e “Release after flashing”
5. Clique em **"Tasmotize!"**

### ✅ Passo 5 – Configurar o Wi-Fi

1. Após o flash, a ESP cria uma rede Wi-Fi `tasmota-XXXX`
2. Conecte-se a ela com o celular ou PC
3. Vá para `192.168.4.1` no navegador
4. Configure o Wi-Fi local
5. A ESP vai reiniciar conectada à sua rede

### ✅ Passo 6 – Descobrir o IP

- Use o app **Fing** ou veja no seu roteador
- Acesse via navegador: `http://[ip-da-esp]`

---

## ✅ Concluído!

Agora sua ESP8266 está com o **Tasmota** instalado e pronta para automação via **MQTT, HTTP, sensores**, etc.

---

**Mestrado em Engenharia Eletrônica e Computação – UCPel**  
Dr. Rogério Albandes, Ph.D. in Computer Science · [Voltar para o README](../README.md)