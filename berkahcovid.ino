#include <WiFi.h>
const char* ssid     = "BEN";
const char* password = "987654321";
const char* host = "192.168.143.87";

void setup()
{

  Serial.begin(115200);

  // We start by connecting to a WiFi network

//  Serial.println();
//  Serial.println();
//  Serial.print("Connecting to ");
//  Serial.println(ssid);

  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
//    Serial.print(".");
  }

//  Serial.println("");
//  Serial.println("WiFi connected");
//  Serial.println("IP address: ");
//  Serial.println(WiFi.localIP());
}



void loop()
{

  float temperature = random(0, 27);
  float humidity = random(3, 20);
  float amonia = random(4, 40);
  Serial.print("Humidity: ");
  Serial.print(humidity);
  Serial.print(" %\t");
  Serial.print("Temperature: ");
  Serial.print(temperature);
  Serial.println(" *C");
  Serial.print("Amonia: ");
  Serial.print(amonia);
  Serial.println(" ppm");
  delay(3000);


//  Serial.print("connecting to ");
//  Serial.println(host);

  // Use WiFiClient class to create TCP connections
  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
//    Serial.println("connection failed");
    return;
  }




  // This will send the request to the server
  client.print(String("GET http://your_hostname/covid/sensor/berkahcovid.php?") +
               ("&temperature=") + temperature +
               ("&humidity=") + humidity +
               ("&amonia=") + amonia +
               " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" +
               "Connection: close\r\n\r\n");
  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 1000) {
//      Serial.println(">>> Client Timeout !");
      client.stop();
      return;
    }
  }

  // Read all the lines of the reply from server and print them to Serial
  while (client.available()) {
    String line = client.readStringUntil('\r');
//    Serial.print(line);
  }
//  Serial.println();
//  Serial.println("closing connection");
}
