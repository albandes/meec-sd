

mosquitto_sub -h 54.235.114.156 -t 'iot/lampada/+/status'
mosquitto_pub -h 54.235.114.156 -t "iot/lampada/1/status" -m "on"
