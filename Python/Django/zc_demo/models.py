from django.db import models

#Create your models here.
class ZingChartConfig(models.Model):
    title = models.CharField(max_length = 50)
    xAxis = models.CharField(max_length = 20)
    yAxis = models.CharField(max_length = 20)
    theme = models.CharField(max_length = 20)
    dangerRangeLow = models.IntegerField()
    dangerRangeHigh = models.IntegerField()
    warningRangeLow = models.IntegerField()
    warningRangeHigh = models.IntegerField()
    idleRangeLow = models.IntegerField()
    idleRangeHigh = models.IntegerField()

    class Meta:
        db_table = "zingchart_config"

class ZingChartSeriesData1(models.Model):
    time        = models.IntegerField()
    temperature = models.IntegerField()

    class Meta:
        db_table = "zingchart_data_1"

class ZingChartSeriesData2(models.Model):
    time        = models.IntegerField()
    temperature = models.IntegerField()

    class Meta:
        db_table = "zingchart_data_2"

class ZingChartSeriesData3(models.Model):
    time        = models.IntegerField()
    temperature = models.IntegerField()

    class Meta:
        db_table = "zingchart_data_3"