import logging
from telegram import Update
from telegram.ext import Application, CommandHandler, MessageHandler, filters
import requests

# تنظیمات لاگ
logging.basicConfig(
    format="%(asctime)s - %(name)s - %(levelname)s - %(message)s", level=logging.INFO
)
logger = logging.getLogger(__name__)

# توکن ربات تلگرام
TELEGRAM_BOT_TOKEN = ""

# آدرس API شما
API_URL = "https://my-api-3000.run.goorm.app/generate-stream?prompt="

async def start(update: Update, context):
    """ارسال پیام خوش‌آمدگویی"""
    await update.message.reply_text("سلام! من یک ربات هوش مصنوعی هستم. هر پیامی بفرستید تا پاسخ بدهم.")

async def handle_message(update: Update, context):
    """پردازش پیام کاربر و ارسال پاسخ از API"""
    user_message = update.message.text
    user_id = update.message.from_user.id

    try:
        # ارسال درخواست به API
        response = requests.get(f"{API_URL}{user_message}", stream=True)

        if response.status_code == 200:
            # جمع‌آوری پاسخ‌های استریم
            full_response = ""
            for chunk in response.iter_content(chunk_size=None):
                if chunk:
                    full_response += chunk.decode("utf-8")

            # ارسال پاسخ به کاربر
            await update.message.reply_text(full_response)
        else:
            await update.message.reply_text("مشکلی در ارتباط با سرور پیش آمد. لطفاً بعداً تلاش کنید.")
    except Exception as e:
        logger.error(f"خطا در پردازش پیام: {e}")
        await update.message.reply_text("مشکلی پیش آمد. لطفاً بعداً تلاش کنید.")

def main():
    """شروع ربات تلگرام"""
    # ایجاد برنامه ربات
    application = Application.builder().token(TELEGRAM_BOT_TOKEN).build()

    # ثبت دستورات و handlers
    application.add_handler(CommandHandler("start", start))
    application.add_handler(MessageHandler(filters.TEXT & ~filters.COMMAND, handle_message))

    # شروع ربات
    application.run_polling()

if __name__ == "__main__":
    main()