from telegram.ext import Updater, MessageHandler, Filters

# Set up your Telegram bot token
bot_token = '5412336519:AAH-HGiiJJ-AZE3D5FF9457pJACcT-jbqQg'

# Create a bot instance
bot = Bot(token=bot_token)

def handle_message(update: Update, context):
    # Get the message text
    message = update.message.text

    # Parse the message for the numbers
    numbers = message.split()
    num1 = int(numbers[0])
    num2 = int(numbers[1])

    # Calculate the sum
    result = num1 + num2

    # Send the result to the Telegram channel
    chat_id = 'localipy'
    bot.send_message(chat_id=chat_id, text=f"The sum of {num1} and {num2} is {result}.")

def main():
    # Create an updater and set up the message handler
    updater = Updater(bot_token, use_context=True)
    dispatcher = updater.dispatcher
    dispatcher.add_handler(MessageHandler(Filters.text & ~Filters.command, handle_message))

    # Start the bot
    updater.start_polling()
    updater.idle()

if __name__ == '__main__':
    main()
