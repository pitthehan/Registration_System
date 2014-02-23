<html>
    <title>Register</title>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <script type="text/javascript">
            //create an ajax engine
            function getXmlHttpObject() {

                var xmlHttpRequest;

                //different browsers get xmlhttprequest object in different ways
                if (window.ActiveXObject) {
                    xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } else {
                    xmlHttpRequest = new XMLHttpRequest();
                }

                return xmlHttpRequest;
            }
            var myXmlHttpRequest = "";
            //check whether username exists
            function checkName() {
                myXmlHttpRequest = getXmlHttpObject();
                //send request to a certain page in server through myXmlHttpRequest url sends ajax request to a certain page (http request/no refresh)
                //request method:get/post ture means using asynchronous
                var url = "/ajax/registerProcess.php";
                var data = "username=" + $('username').value;
                //open request
                myXmlHttpRequest.open("post", url, true);
                myXmlHttpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                //callback function process is a function name
                myXmlHttpRequest.onreadystatechange = proc;
                //send request. if get - null, if post - real data
                myXmlHttpRequest.send(data);
            }

            function $(id) {
                return document.getElementById(id);
            }
            //line 4
            function proc() {

                //window.alert(myXmlHttpRequest.readyState);
                if (myXmlHttpRequest.readyState == 4) {
                    //window.alert("server return"+myXmlHttpRequest.responseText);
                    //$('myres').value = myXmlHttpRequest.responseText;
                    //get xml data, myXmlHttpRequest.responseXML is a DOM object
                    //window.alert(myXmlHttpRequest.responseXML);
                    //var mes = myXmlHttpRequest.responseXML.getElementsByTagName("mes");
                    //window.alert(mes.length);
                    //var mes_val = mes[0].childNodes[0].nodeValue;
                    //$('myres').value = mes_val;
                    var mes = myXmlHttpRequest.responseText;
                    //use eval string->object
                    var mes_obj = eval("(" + mes + ")");
                    //window.alert(mes_obj[1].name);
                    //$('myres').value=(mes_obj[0].res);
                    for (var i = 0; mes_obj.length; i++)
                    {
                        window.alert(mes_obj[i].name);
                    }
                }
            }
        </script>
    </head>
    <body>
        <form action="???" method="post">
            Username:<input type="text" name="username1" id="username"><input type="button" onclick="checkName();"  value="Check Username">
            <input style="border-width: 0;color: red" type="text" id="myres">
            <br/>
            Password:<input type="password" name="password"><br>
            Email:<input type="text" name="email"><br/>
            <input type="submit" value="Register">
        </form>
        <form action="" method="post">
            Username:<input type="text" name="username2" >

            <br/>
            Password:<input type="password" name="password"><br>
            Email:<input type="text" name="email"><br/>
            <input type="submit" value="Register">
        </form>
    </body>
</html>