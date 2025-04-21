# Configurando 2 LEDs no Tasmota (GPIO4 e GPIO5)

Este guia passo a passo explica como configurar dois LEDs conectados aos pinos GPIO4 e GPIO5 em um dispositivo com firmware Tasmota.

## Pré-requisitos

* Um dispositivo com firmware Tasmota instalado e conectado à sua rede Wi-Fi.
* Dois LEDs.
* Dois resistores adequados para limitar a corrente dos LEDs (o valor dependerá da tensão de alimentação e das especificações dos LEDs).
* Fios para conexão.

**Aviso:** Certifique-se de desligar a energia do dispositivo Tasmota antes de conectar qualquer componente eletrônico. Conexões incorretas podem danificar o dispositivo e os LEDs. Sempre utilize resistores em série com os LEDs.

## Passo 1: Acesse a Interface Web do Tasmota

1.  **Descubra o endereço IP:** Verifique o painel de controle do seu roteador ou utilize um aplicativo de descoberta de rede para encontrar o endereço IP atribuído ao seu dispositivo Tasmota.
2.  **Abra um navegador:** Digite o endereço IP do dispositivo na barra de endereços do seu navegador (ex: `192.168.1.100`) e pressione Enter. A interface web do Tasmota será aberta.

## Passo 2: Configure os Módulos GPIO

1.  **Vá para a Configuração:** No menu principal da interface web, clique em **"Configuration"**.
2.  **Selecione Configurar Módulo:** No submenu, clique em **"Configure Module"**.
3.  **Defina os GPIOs:** Localize as linhas correspondentes aos pinos GPIO4 e GPIO5 na tabela.
    * Na linha do **GPIO4**, selecione na lista suspensa a opção **"Relay 1"** (ou **"Output 1"**).
    * Na linha do **GPIO5**, selecione na lista suspensa a opção **"Relay 2"** (ou **"Output 2"**).
4.  **Salve as configurações:** Role até o final da página e clique no botão **"Save"**. O dispositivo Tasmota será reiniciado para aplicar as novas configurações.

## Passo 3: Conecte os LEDs ao Dispositivo Tasmota

1.  **Identifique os pinos:** Localize os pinos GPIO4 e GPIO5 no seu dispositivo Tasmota. Consulte a documentação do seu dispositivo se necessário.
2.  **Conecte o primeiro LED (GPIO4):**
    * Conecte o terminal positivo (ânodo) do primeiro LED ao pino GPIO4 **através de um resistor**.
    * Conecte o terminal negativo (cátodo) do primeiro LED ao pino GND (terra) do seu dispositivo Tasmota.
3.  **Conecte o segundo LED (GPIO5):**
    * Conecte o terminal positivo (ânodo) do segundo LED ao pino GPIO5 **através de outro resistor**.
    * Conecte o terminal negativo (cátodo) do segundo LED ao pino GND (terra) do seu dispositivo Tasmota.

## Passo 4: Controle os LEDs

Após a reinicialização, você pode controlar os LEDs de diferentes maneiras:

* **Na Interface Web:**
    * Retorne à página principal da interface web do Tasmota.
    * Você deverá ver dois botões (ou caixas de seleção) rotulados como **"Relay 1"** e **"Relay 2"**.
    * Clique nesses botões para alternar o estado dos LEDs (ligado/desligado). "Relay 1" controlará o LED conectado ao GPIO4, e "Relay 2" controlará o LED conectado ao GPIO5.

* **Via MQTT (se configurado):**
    * Para o LED no GPIO4: Envie um comando MQTT para o tópico `cmnd/NOME_DO_SEU_DISPOSITIVO/POWER1` com o payload `ON` para ligar ou `OFF` para desligar.
    * Para o LED no GPIO5: Envie um comando MQTT para o tópico `cmnd/NOME_DO_SEU_DISPOSITIVO/POWER2` com o payload `ON` para ligar ou `OFF` para desligar.
    * Substitua `NOME_DO_SEU_DISPOSITIVO` pelo nome MQTT configurado no seu dispositivo Tasmota.

## Dicas Adicionais

* **Nomes dos Botões:** Para tornar a interface web mais intuitiva, você pode alterar os rótulos dos botões. Vá em **"Configuration"** -> **"Configure Other"** e modifique os campos **"Button1 Label"** e **"Button2 Label"** para nomes como "LED Vermelho" e "LED Verde", por exemplo.
* **Resistores:** A escolha correta dos resistores é crucial para proteger os LEDs. Utilize a Lei de Ohm ($V = IR$) para calcular o valor adequado, considerando a tensão de alimentação (geralmente 3.3V nos GPIOs) e as especificações de corrente e tensão dos seus LEDs.

---

**Mestrado em Engenharia Eletrônica e Computação – UCPel**  
Dr. Rogério Albandes, Ph.D. in Computer Science · [Voltar para o README](../README.md)