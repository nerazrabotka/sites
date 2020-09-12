FROM python:3.6
WORKDIR /app
COPY site_1.py /app
COPY config.py /app
COPY /template /app/template
COPY requirements.txt /app
RUN pip install -r requirements.txt
CMD export FLASK_ENV=development
CMD python site_1.py
EXPOSE 5001
