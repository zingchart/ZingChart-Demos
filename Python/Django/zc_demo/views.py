import json
from django.shortcuts import render
from django.http import HttpResponse
from django.http import JsonResponse
from zc_demo.models import ZingChartSeriesData1,ZingChartSeriesData2,ZingChartSeriesData3,ZingChartConfig

# Create your views here.
def index(request):
    # html = '''<h1>Welcome to Django-ZingChart!</h1>
    # <div id="mychart"></div>'''

    # zingchartConfig = ZingChartConfig.objects.all()
    # zingchartSeriesData1 = ZingChartSeriesData1.objects.all()
    # oSeriesTemperatureData1 = []
    # oSeriesTimeData1 = []
    # for e in oData:
    #     oSeriesTemperatureData1.append(e.temperature)
    #     oSeriesTimeData1.append(e.time)

    # zingchartConfig = ZingChartConfig(
    #     title = 'GS3-Slim Antutu Benchmark at Room Temp',
    #     xAxis = 'Time (s)',
    #     yAxis = 'Temperature (C)',
    #     theme = 'classic'
    # )
    # zingChartSeriesData1 = ZingChartSeriesData1(
    #     time = 0,
    #     temperature = 20
    # )
    # zingChartSeriesData2 = ZingChartSeriesData2(
    #     time = 0,
    #     temperature = 19
    # )
    # zingChartSeriesData3 = ZingChartSeriesData3(
    #     time = 0,
    #     temperature = 21
    # )
    # zingChartSeriesData1.save()
    # zingChartSeriesData2.save()
    # zingChartSeriesData3.save()
    #zingChartConfig.save()

    #return HttpResponse(html)
    return render(request, "index.html")

def data(request):
    # Getting all chart-series data from DB
    oData = ZingChartSeriesData1.objects.all()
    aSeriesTemperatureData1 = []
    aSeriesTimeData1 = []
    response_data = {}
    for e in oData:
        aSeriesTemperatureData1.append(e.temperature)
        aSeriesTimeData1.append(e.time)
    response_data['times'] = aSeriesTimeData1
    response_data['temps'] = aSeriesTemperatureData1
    return JsonResponse(response_data)

def zingchartConfig(request):
    # Getting all chart-config data from DB
    configData = ZingChartConfig.objects.all()
    response_data = {}
    for e in configData:
        print('e: ', e.title)
        response_data['title'] = e.title
        response_data['xAxis'] = e.xAxis
        response_data['yAxis'] = e.yAxis
        response_data['theme'] = e.theme
        response_data['dangerRangeLow'] = e.dangerRangeLow
        response_data['dangerRangeHigh'] = e.dangerRangeHigh
        response_data['warningRangeLow'] = e.warningRangeLow
        response_data['warningRangeHigh'] = e.warningRangeHigh
        response_data['idleRangeLow'] = e.idleRangeLow
        response_data['idleRangeHigh'] = e.idleRangeHigh
    return JsonResponse(response_data)#{'blah': 'moreBlah'})

