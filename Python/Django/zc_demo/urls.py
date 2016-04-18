from django.conf.urls import url

from . import views

urlpatterns = [
    url(r'^index/', views.index, name='index'),
    url(r'^config/', views.zingchartConfig, name='zingchartConfig'),
    url(r'^data/', views.data, name='data'),
]

