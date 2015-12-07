<%@ page import="java.io.*" %>
<%@ page import="java.sql.*" %>
<%@ page import="java.util.*" %>

<%!
    // --- String Join Function
    public String join(ArrayList<?> arr, String del)
    {

        StringBuilder output = new StringBuilder();

        for (int i = 0; i < arr.size(); i++)
        {

            if (i > 0) output.append(del);
            
            // --- Quote strings, only, for JS syntax
            if (arr.get(i) instanceof String) output.append("\"");
            output.append(arr.get(i));
            if (arr.get(i) instanceof String) output.append("\"");
        }

        return output.toString();
    }
%>

<!DOCTYPE html>
<html>
<head>
    <title>MySQL Demo</title>
    <script type="text/javascript" src="https://cdn.zingchart.com/zingchart.min.js"></script>
</head>
<body>
    <script>
        <%
            Class.forName("com.mysql.jdbc.Driver").newInstance();

            final String host = "jdbc:mysql://localhost/" + "dbname";
            final Connection conn = DriverManager.getConnection(host, "user", "pass");
            final Statement stmt = conn.createStatement();
            final ResultSet rs = stmt.executeQuery("query");

            ArrayList<String> months = new ArrayList<String>();
            ArrayList<Integer> users = new ArrayList<Integer>();

            while(rs.next())
            {
                months.add(rs.getString("colname"));
                users.add(Integer.parseInt(rs.getString("colname")));
            }

            conn.close();
        %>

        var monthData = [<%= join(months, ",") %>];
        var userData = [<%= join(users, ",") %>];
        
    </script>
    <script>
    window.onload = function()
    {
        zingchart.render
        ({
            id:"myChart",
            width:"100%",
            height:400,
            data:
            {
                "type":"bar",
                "title":
                {
                    "text":"Data Pulled from MySQL Database"
                },
                "scale-x":
                {
                    "labels": monthData
                },
                "plot":
                {
                    "line-width":1
                },
                "series":
                [
                    {
                      "values":userData
                    }
                ]
            }
        });
    };
    </script>
    <h1>Data from MySQL Database</h1>
    <div id="myChart"></div>
</body>
</html>