#MyNotes Website for SIM

1. **Create a virtual host or use main domain/subdomain**
2. **Create a private/config.ini file and use this template** (remove all <> and change anything if needed)

```ini
[database]
host = <localhost>
username = <root>
password = <password>
dbname = <db>
port = <3306>
```
*Structure:*
```
sim
│___...
|
│   
└───private
│   config.ini
│   
└───...
```
