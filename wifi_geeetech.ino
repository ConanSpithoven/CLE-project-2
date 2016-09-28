#include <WiFi.h>
#include <SPI.h>

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
byte server[] = { 64, 233, 187, 99 }; // Google

char ssid[] = "kappa123";
char pass[] = "0987654321";
int keyIndex = 0;
int status = WL_IDLE_STATUS;


IPAddress ip;

void setup() {

  
  if (WiFi.status() == WL_NO_SHIELD) {
    delay(5000);
    Serial.println("WiFi shield not present");
    // don't continue:
    while (true);
  }
  
  Serial.println("shield found");
  
 

  delay(2000);
}

void loop() {

}
