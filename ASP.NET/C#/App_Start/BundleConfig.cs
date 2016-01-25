using System.Web;
using System.Web.Optimization;

namespace zingchartDemo
{
    public class BundleConfig
    {
        // For more information on bundling, visit http://go.microsoft.com/fwlink/?LinkId=301862
        public static void RegisterBundles(BundleCollection bundles)
        {
            bundles.Add(new ScriptBundle("~/bundles/bootstrap").Include(
                      "~/Scripts/bootstrap.js",
                      "~/Scripts/respond.js"));

            // Used to important zingChart and all associated modules
            bundles.Add(new ScriptBundle("~/bundles/zingchart").Include(
                      "~/Scripts/zingchart.min.js"));


        }
    }
}
