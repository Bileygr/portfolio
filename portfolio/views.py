from django.http import HttpResponse
from django.template import loader
from django.shortcuts import redirect
from django.shortcuts import render
from portfolio.forms import UserConnexionForm
from portfolio.forms import UserInscriptionForm
from portfolio.models import Content
from portfolio.models import User
from pprint import pprint

context = {'hostname': 'http://127.0.0.1:8000/'}

def connexion(request):
	if request.method == 'POST':
		form = UserConnexionForm(request.POST)

		if form.is_valid():
			email = form.cleaned_data['email']
			password = form.cleaned_data['password']

			user = User.objects.get(email=email)

			if password == user.password:
				user = {"last_name": user.last_name, "first_name": user.first_name, "password": user.password, "email": user.email, "telephone": user.telephone, "last_login": str(user.last_login), "creation": str(user.creation)}
				request.session['user'] = user
				return redirect('accueil')
			else:
				return redirect('connexion')
	else:
		form = UserConnexionForm()
	return render(request, 'connexion.html', {'form': form}, context)

def index(request):
	content = Content.objects.get(pk=1)
	context = {'content': content}
	return render(request, 'index.html', context)

def inscription(request):
	if request.method == 'POST':
		form = UserInscriptionForm(request.POST)

		if form.is_valid():
			last_name = form.cleaned_data['last_name']
			first_name = form.cleaned_data['first_name']
			password = form.cleaned_data['password']
			confirm_password = form.cleaned_data['confirm_password']
			email = form.cleaned_data['email']
			telephone = form.cleaned_data['telephone']

			if password == confirm_password:
				user = User(last_name=last_name, first_name=first_name, password=password, telephone=telephone, email=email)
				user.save()
				return redirect('connexion')
			else:
				return redirect('inscription')
	else:
		form = UserInscriptionForm()
	return render(request, 'inscription.html', {'form': form})

def formation(request):
	return render(request, 'formation.html', context)

def btsSIO(request):
	return render(request, 'bts-sio.html', context)

def e4(request):
	return render(request, 'e4.html', context)

def e6(request):
	return render(request, 'e6.html', context)

def ppe1(request):
	return render(request, 'ppe1.html', context)

def ppe1Documentations(request):
	return render(request, 'ppe1-documentations.html', context)

def ppe1Downloads(request):
	return render(request, 'ppe1-downloads.html', context)

def ppe2(request):
	return render(request, 'ppe2.html', context)

def ppe2Documentations(request):
	return render(request, 'ppe2-documentations.html', context)

def nouvelles(request):
	return render(request, 'nouvelles.html', context)

def veilletechnologique(request):
	return render(request, 'veille_technologique.html', context)
