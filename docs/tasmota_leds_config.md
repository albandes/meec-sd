# Configurando 2 LEDs nas GPIO4 e GPIO5 com Tasmota

## Requisitos

- Dispositivo ESP8266 ou ESP32 com Tasmota instalado
- Acesso ao IP do dispositivo via navegador
- LEDs conectados nas GPIOs 4 e 5 (com resistor e polaridade correta)

## Passo a passo

### 1. Acesse a interface web do Tasmota

- Digite o IP do seu dispositivo no navegador (ex: `http://192.168.1.100`)

### 2. Vá até o menu "Configuração"

- Clique em **Configuração** > **Configurar módulo**

### 3. Selecione o tipo de módulo

- Escolha o tipo de placa ou selecione "Generic (18)" para personalizar

### 4. Configure as GPIOs

- **GPIO4**: selecione **Relay1**
- **GPIO5**: selecione **Relay2**

### 5. Salve e reinicie

- Clique em **Salvar** e aguarde o reinício do dispositivo

## Testando os LEDs pela interface

- A interface mostrará os botões **Power 1** e **Power 2**
- Clique para ligar/desligar os LEDs

## Comandos via HTTP

Você pode usar comandos no navegador, substituindo `<IP_TASMOTA>` pelo IP real:

```
http://<IP_TASMOTA>/cm?cmnd=Power1%20On
http://<IP_TASMOTA>/cm?cmnd=Power2%20Off
```

## Comandos via MQTT

### Tópico padrão

O tópico padrão do Tasmota é `tasmota_<MAC>` ou conforme configurado em **Configuração > Configurar MQTT**.

### Comandos para controle

- **Ligar LED 1:**

```
tópico/cmnd/Power1
Payload: ON
```

- **Desligar LED 1:**

```
tópico/cmnd/Power1
Payload: OFF
```

- **Ligar LED 2:**

```
tópico/cmnd/Power2
Payload: ON
```

- **Desligar LED 2:**

```
tópico/cmnd/Power2
Payload: OFF
```

### Exemplo com tópico `sala/led`

```
tópico: sala/led/cmnd/Power1
payload: ON
```

## Personalização dos nomes dos botões

- Vá em **Configuração > Outro**
- Altere `Nome 1` e `Nome 2` para algo como "LED Verde" e "LED Vermelho"

---

Qualquer dúvida, volte a este guia ou entre em contato com o professor.
