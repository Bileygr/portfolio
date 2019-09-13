"""portfolio URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/2.1/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import include, path
from . import views

urlpatterns = [
    path('', views.index, name='accueil'),
    path('connexion', views.connexion, name='connexion'),
    path('veille-technologique', views.veilletechnologique),
    path('formation/bts-sio', views.btsSIO),
    path('formation/bts-sio/e4', views.e4),
    path('formation/bts-sio/e4/ppe1', views.ppe1),
    path('formation/bts-sio/e4/ppe1/documentations', views.ppe1Documentations),
    path('formation/bts-sio/e4/ppe1/downloads', views.ppe1Downloads),
    path('formation/bts-sio/e4/ppe2', views.ppe2),
    path('formation/bts-sio/e4/ppe2/documentations', views.ppe2Documentations),
    path('formation/bts-sio/e6', views.e6),
    path('formation', views.formation),
    path('inscription', views.inscription, name='inscription'),
    path('nouvelles', views.nouvelles, name="nouvelles"),
]