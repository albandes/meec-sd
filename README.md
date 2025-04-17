# Projeto IoT: Controle de Leds com MQTT + Tasmota + HTML

Este projeto demonstra como controlar leds via interface web responsiva utilizando **HTML + Bootstrap + MQTT.js**, com ESP8266 rodando **Tasmota**, e um broker **Mosquitto** configurado para conexões WebSocket.

---

## 📁 Estrutura dos Arquivos

- `index.html` – Interface web com botões de controle e status das lâmpadas
- `api/registrar_status.php` – Script para registrar o status recebido
- `docs/mqttjs_explicacao.md` – Como funciona o JavaScript com MQTT.js
- `docs/html_css_layout.md` – Explicação do layout HTML + CSS
- `docs/mosquitto_websocket_setup.md` – Como instalar e configurar o Mosquitto com WebSocket
- `docs/tasmota_mqtt_integration.md` – Como configurar o Tasmota para funcionar com os tópicos esperados

---

## 🚀 Requisitos

- Servidor com PHP (Apache/Nginx)
- Mosquitto instalado com suporte a WebSocket
- ESP8266 com firmware Tasmota
- Acesso à rede local ou IP público

---

## 🔧 Configuração rápida

### 1. Suba os arquivos do projeto em um servidor web (ex: `public_html/`)
### 2. Instale e configure o Mosquitto
Consulte [`docs/mosquitto_websocket_setup.md`](docs/mosquitto_websocket_setup.md)

### 3. Configure o Tasmota
Consulte [`docs/tasmota_mqtt_integration.md`](docs/tasmota_mqtt_integration.md)

---

## 📚 Como funciona

- A interface HTML se conecta ao broker MQTT via `mqtt.js` (WebSocket)
- Ao clicar em "Ligar" ou "Desligar", é publicado um comando no tópico:
  ```
  iot/lampada/1/comando
  ```
- O Tasmota responde com o status no tópico:
  ```
  iot/lampada/1/status
  ```
- A página atualiza a interface (ícone + texto)

---

## 📂 Documentação complementar

- [Explicação do código HTML e CSS](docs/html_css_layout.md)
- [Como funciona o MQTT.js](docs/mqttjs_explicacao.md)
- [Guia de configuração do Mosquitto com WebSocket](docs/mosquitto_websocket_setup.md)
- [Guia de configuração do Tasmota e tópicos](docs/tasmota_mqtt_integration.md)
