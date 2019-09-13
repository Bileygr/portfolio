from datetime import datetime
from django.db import models

class User(models.Model):
    last_name = models.CharField(max_length=50, unique=True)
    first_name = models.CharField(max_length=50, unique=True)
    password = models.CharField(max_length=64, unique=True)
    email = models.CharField(max_length=50, unique=True)
    telephone = models.CharField(max_length=10, unique=True)
    last_login = models.DateTimeField(auto_now=True)
    creation = models.DateTimeField(default=datetime.now)

class Content(models.Model):
    contact_name = models.CharField(max_length=50, unique=True)
    contact_email = models.CharField(max_length=50)
    contact_telephone = models.CharField(max_length=50)
    contact_address = models.CharField(max_length=38)
    profession = models.CharField(max_length=50)
    office_hours = models.CharField(max_length=200)
    short_bio = models.TextField()
    creation = models.DateTimeField(default=datetime.now)

class News(models.Model):
	content = models.TextField()
	publication = models.DateTimeField(default=datetime.now)