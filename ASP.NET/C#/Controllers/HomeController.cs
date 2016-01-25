using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using System.Web.Script.Serialization;

namespace zingchartDemo.Controllers
{
    public class HomeController : Controller
    {
        public ActionResult Index()
        {
            // Int values from DB
            int[] valuesArray = { 35, 42, 67, 89, 25, 34, 67, 85 }; 

            // First way to pass data
            // Serialize your data on the server side with a JSON framework for .NET
            ViewData["valuesArray"] = Newtonsoft.Json.JsonConvert.SerializeObject(valuesArray); 
               

            // Second way to pass data
            ZingChartModel myObj = new ZingChartModel(); // Create a model to hold your data
            myObj.values = valuesArray; // Assign values from DB to your model
            return View(myObj);         // Pass model into view
        }
    }
}