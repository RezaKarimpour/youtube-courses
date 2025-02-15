from fastapi import FastAPI, HTTPException
import requests
from fastapi.responses import StreamingResponse
import json

app = FastAPI()

# آدرس سرور Ollama
OLLAMA_URL = "http://127.0.0.1:11434/api/generate"

@app.get("/generate-stream")
async def generate_stream(prompt: str):

    try:
        # داده‌های ورودی برای مدل
        payload = {
            "model": "deepseek-r1:1.5b",  # نام مدل
            "prompt": prompt,             # متن ورودی از کاربر
            "stream": True                # فعال کردن حالت استریم
        }

        # ارسال درخواست POST به سرور Ollama
        response = requests.post(OLLAMA_URL, json=payload, stream=True)

        # بررسی پاسخ
        if response.status_code == 200:
            def generate():
                for chunk in response.iter_lines():
                    if chunk:
                        # تبدیل بایت‌ها به رشته و سپس به دیکشنری
                        chunk_data = json.loads(chunk.decode("utf-8"))
                        # استخراج فیلد response و ارسال آن به کلاینت
                        yield chunk_data.get("response", "")
            return StreamingResponse(generate(), media_type="text/plain")
        else:
            raise HTTPException(status_code=response.status_code, detail=response.text)
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

# اجرای سرور FastAPI
if __name__ == "__main__":
    import uvicorn
    uvicorn.run(app, host="0.0.0.0", port=3000)