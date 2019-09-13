from django import forms

class UserConnexionForm(forms.Form):
	email = forms.EmailField(widget=forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Email'}), label="Email")
	password = forms.CharField(widget=forms.PasswordInput(attrs={'class': 'form-control', 'placeholder': 'Mot de passe'}), label='Mot de passe', max_length=32)

class UserInscriptionForm(forms.Form):
	last_name = forms.CharField(widget=forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Nom'}), label='Nom', max_length=100)
	first_name = forms.CharField(widget=forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Prénom'}), label='Prénom', max_length=100)
	password = forms.CharField(widget=forms.PasswordInput(attrs={'class': 'form-control', 'placeholder': 'Mot de passe'}), label='Mot de passe', max_length=32)
	confirm_password = forms.CharField(widget=forms.PasswordInput(attrs={'class': 'form-control', 'placeholder': 'Confirmation du mot de passe'}), label='Confirmation du mot de passe', max_length=32)
	email = forms.EmailField(widget=forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Email'}), label="Email")
	telephone = forms.CharField(widget=forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Téléphone'}), label='Téléphone', max_length=100)