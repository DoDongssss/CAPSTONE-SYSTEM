#include <SPI.h>
#include <MFRC522.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>


#define SS_PIN D4
#define RST_PIN D2

#define ERROR_PIN D3
#define SUCCESS_PIN D1
#define CONN_PIN D0
#define BUZZER D8

const char *ssid = "PLDTHOMEFIBRzV2aG"; //WIFI NAME OR HOTSPOT
const char *password = "DooDong_0330"; //WIFI PASSWORD POR MOBILE HOTSPOT PASSWORD
WiFiServer server(80);
WiFiClient wifiClient;

MFRC522 mfrc522(SS_PIN, RST_PIN);
void setup() {
  delay(1000);
  Serial.begin(9600);
  WiFi.mode(WIFI_OFF);
  delay(1000);
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  Serial.println("");

  pinMode(CONN_PIN, OUTPUT);
  pinMode(SUCCESS_PIN, OUTPUT);
  pinMode(ERROR_PIN, OUTPUT);

  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
    tone(BUZZER, 100);
    delay(400);
    tone(BUZZER, LOW);
  }

  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());

  SPI.begin();
  mfrc522.PCD_Init();
}

void sendRfidLog(long cardid) {

  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    String postData = "cardid=" + String(cardid) + "&action=attendance";
    http.begin(wifiClient, "http://192.168.1.37/1tap/attendance-data-process.php");
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    int httpCode = http.POST(postData);
    String payload = http.getString();
    Serial.println(httpCode);
    Serial.println(payload);
    Serial.println(cardid);

    if (httpCode == 200) {
      tone(BUZZER, 450);
      delay(1000);
      tone(BUZZER, LOW);
    }

    http.end();
  }
}

void toggleConnStat() {
  if (WiFi.status() == WL_CONNECTED) {
    tone(BUZZER, LOW);
  } else {
  }
}

void loop() {

  if ( mfrc522.PICC_IsNewCardPresent()) {
    if ( mfrc522.PICC_ReadCardSerial()) {
      long code = 0;
      for (byte i = 0; i < mfrc522.uid.size; i++) {
        code = ((code + mfrc522.uid.uidByte[i]) * 10);
      }
      sendRfidLog(code);
    }
  }
  toggleConnStat();
  delay (1000);
}
