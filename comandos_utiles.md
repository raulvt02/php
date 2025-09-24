
# Comandos Útiles para Detectar Puertos Abiertos y Administrar Procesos en Desarrollo Web

Este documento proporciona comandos útiles para identificar qué procesos están utilizando ciertos puertos en sistemas Linux y Windows. Estos comandos son fundamentales en el desarrollo web en entornos servidor, ya que es común trabajar con servicios que utilizan puertos específicos (como el puerto 80 para HTTP o el 443 para HTTPS).

## Índice
1. [Comandos en Linux](#comandos-en-linux)
    - Ver puertos abiertos
    - Detectar qué proceso usa un puerto
    - Identificar el PID de un proceso
    - Matar un proceso
2. [Comandos en Windows](#comandos-en-windows)
    - Ver puertos abiertos
    - Detectar qué proceso usa un puerto
    - Identificar el PID de un proceso
    - Matar un proceso
3. [Comandos Adicionales](#comandos-adicionales)
    - Comandos avanzados en Linux
    - Comandos avanzados en Windows

---

## Comandos en Linux

### 1. Ver Puertos Abiertos

Para listar todos los puertos abiertos en Linux, puedes usar el comando `netstat` o `ss`. Un ejemplo de cómo hacerlo es:

```bash
netstat -tuln
```

Este comando mostrará todos los puertos TCP y UDP abiertos en el sistema. Si prefieres usar `ss`, que es más moderno y eficiente, puedes usar:

```bash
ss -tuln
```

Si deseas hacer un escaneo completo de puertos, puedes usar la herramienta `nmap`:

```bash
nmap localhost
```

### 2. Detectar qué Proceso Usa un Puerto

Para ver qué proceso está utilizando un puerto específico, usa el siguiente comando `lsof`:

```bash
lsof -i :<puerto>
```

**Ejemplo**: Para listar los procesos que están utilizando el puerto 80 (HTTP), usa:

```bash
lsof -i :80
```

### 3. Identificar el PID del Proceso

En la salida del comando `lsof`, verás una columna que indica el PID (Process ID) del proceso que está utilizando el puerto especificado. Por ejemplo:

```
COMMAND   PID   USER   FD   TYPE DEVICE SIZE/OFF NODE NAME
nginx     1234  root   6u   IPv4 123456 0t0      TCP *:http (LISTEN)
```

El PID del proceso que está utilizando el puerto 80 es `1234`.

### 4. Matar un Proceso

Para matar un proceso en Linux, usa el comando `kill` seguido del PID:

```bash
kill -9 <PID>
```

**Ejemplo**: Si el PID es `1234`, el comando sería:

```bash
kill -9 1234
```

---
# Comandos en Windows

## 1. Ver Puertos Abiertos

Para ver los puertos abiertos en Windows, puedes usar el siguiente comando en **CMD** o **PowerShell**:

```bash
netstat -aon
```

Este comando lista todas las conexiones activas y los puertos en escucha en el sistema. Los resultados mostrarán la dirección IP local, el puerto, la dirección IP remota, el estado de la conexión y el **PID** (identificador del proceso) correspondiente.

## 2. Detectar Qué Proceso Usa un Puerto

Si quieres detectar qué proceso está utilizando un puerto específico, puedes usar el siguiente comando:

```bash
netstat -aon | findstr :<puerto>
```

**Ejemplo**: Para ver qué proceso está utilizando el puerto 80:

```bash
netstat -aon | findstr :80
```

Esto te dará el **PID** del proceso que está usando ese puerto.

## 3. Identificar el PID del Proceso

Una vez que obtienes el **PID** del proceso que está utilizando el puerto, puedes usar este comando para obtener más detalles sobre ese proceso:

```bash
tasklist | findstr <PID>
```

**Ejemplo**: Si el **PID** es `1234`, usa:

```bash
tasklist | findstr 1234
```

Esto te proporcionará el nombre del proceso que corresponde a ese **PID**.

## 4. Matar un Proceso

Para finalizar (matar) un proceso en Windows usando el **PID**:

```bash
taskkill /PID <PID> /F
```

**Ejemplo**: Si el **PID** es `1234`, usa:

```bash
taskkill /PID 1234 /F
```

El parámetro `/F` fuerza la terminación del proceso.

---

Estos comandos son útiles para diagnosticar y gestionar puertos y procesos en un entorno Windows.

## Comandos Adicionales

### Comandos Avanzados en Linux

1. **`ss`** (socket statistics):
   - Alternativa moderna a `netstat` para inspeccionar conexiones de red.
   ```bash
   ss -tuln
   ```

2. **`fuser`**:
   - Muestra qué procesos están usando un puerto específico.
   ```bash
   fuser -n tcp <puerto>
   ```

3. **`tcpdump`**:
   - Captura tráfico de red en tiempo real.
   ```bash
   sudo tcpdump -i any port 80
   ```

4. **`ufw`**:
   - Comando para gestionar reglas de firewall y abrir o cerrar puertos.
   ```bash
   sudo ufw allow <puerto>/tcp
   sudo ufw deny <puerto>/tcp
   ```

### Comandos Avanzados en Windows

1. **`Get-Process`** (PowerShell):
   - Lista todos los procesos en ejecución.
   ```powershell
   Get-Process
   ```

2. **`Get-NetTCPConnection`** (PowerShell):
   - Muestra las conexiones TCP activas en el sistema.
   ```powershell
   Get-NetTCPConnection
   ```

---
