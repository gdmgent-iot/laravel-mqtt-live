<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            padding: 1rem;
        }
        #messages {
            width: 100%;
            height:90vh;
            font-size: 1.5rem;
            padding: 10px;
            box-sizing: border-box;
            background: black; 
            color: greenyellow;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <h1>Messages from broker</h1>
    <textarea name="" id="messages">waiting...</textarea>

    <!-- mqtt.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mqtt/2.18.8/mqtt.min.js"></script>
    <script>
        const host = "192.168.0.66";
        const port = 9001;
        const $msgBox = document.getElementById('messages');

        const client = mqtt.connect(`ws://${host}:${port}`);
        client.on('connect', () => {
            client.subscribe('heartbeat', (err) => {
                if (!err) {
                    $msgBox.value = 'Connected to broker! 🟢 \n';
                    $msgBox.value += '---------------------- \n \n';
                }
            })
        });
        client.on('message', (topic, message) => {
            $msgBox.value += message.toString() + '\n'
        })
    </script>

</body>
</html>