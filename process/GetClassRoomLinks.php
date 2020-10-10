

<html><head></head><body>
  <script>
    var userDetails = new Map();
    var courseDetails = new Map();

    //Credential for our application on Google Developer Console
      var YOUR_CLIENT_ID = '531207811184-g1n8qv7apc6ktj3rjlgcs7vq754056nj.apps.googleusercontent.com';
          
    //Google will send the auth code to this URL 
    // If we host it publically, we need to change this link here and in google developer console
    var YOUR_REDIRECT_URI = 'http://localhost:8080/Zoom/home.php';
    var fragmentString = location.hash.substring(1);

    // Parsing info from url after authentication
    var params = {};
    var regex = /([^&=]+)=([^&]*)/g, m;
    while (m = regex.exec(fragmentString)) {
      params[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
    }

    //console.log(params);

    //If state is correct set, then call getInfoFromGoogleClassRoom
    if (Object.keys(params).length > 0) {
      localStorage.setItem('oauth2-test-params', JSON.stringify(params) );
      if (params['state'] && params['state'] == 'try_sample_request') {
        getInfoFromGoogleClassRoom();
      }
    }

    function getInfoFromGoogleClassRoom() {
      console.log("I have arrived");
      var finalResults = getInfoWithAllAnnouncements();
      finalResults1 = getUserInfo(finalResults);

      console.log("Final Results are: --------------");
      console.log(finalResults1);
      console.log("---------------------------------");

    }

    // If there's an access token, run API request.
    // Otherwise, start OAuth 2.0 flow.
    function getInfoWithAllAnnouncements() {
      //Pre-requisite: Check if the user is authenticated
      //step1 get name, email
      //step2: get courses (Done)
      //step3: get announcements for each course (Done)
      //step4: Get latest announcement.
      //step5: check for meeting links. Continue to move to next announcement until you find one with meeting links. Otherwise return empty.
      //step6: Return dictionary: CourseName: MeetingLink    

      var params = JSON.parse(localStorage.getItem('oauth2-test-params'));

      //Check if user is authenticated
      if (params && params['access_token']) {
        console.log("User is Authenticated with token: " + params['access_token'])

        //Get Courses and add courseId and courseName in courseDetails hashmap
        this.getCourses().then((result) => {
          var jsonOutput = JSON.parse(result);
          //Loop through for each course and grab courseId and courseName
          for (var i = 0; i < jsonOutput['courses'].length; i++) {
            var courseId = jsonOutput['courses'][i]['id'];
            var courseName = jsonOutput['courses'][i]['name'];
            courseDetails.set(courseId,[courseName]);
            
            this.getCourseAnnouncement(courseId).then((result) => {
              var announcements = result;
              var jsonOutput1 = JSON.parse(result)
              var meetingTxt = getMeetingLink(announcements);

              if (jsonOutput1['announcements'] != undefined) {
                for (var j = 0; j < jsonOutput1['announcements'].length; j++) {

                  if (meetingTxt!= undefined) {
                    courseDetails.get(jsonOutput1['announcements'][j]['courseId']).push(meetingTxt);
                  } else {
                    courseDetails.get(jsonOutput1['announcements'][j]['courseId']).push("");
                  }
                  
                  //printTheCourseDetailsMapToConsole(courseDetails)
                }
              }
            });
          }
        });

        //clean up the data before sending
        //remove multiple empty string when annoucement does not have meeting link
        // change it to 'no link found'

        var newCourseDetails = new Map();
        for (const [key, value] of courseDetails.entries()) {
          if (value.length == 2) {
            if (value[1] != "") {
              newCourseDetails.set(key,value);
              continue;
            } else {
              value[1] = "no link found";
            }
          } else if (value.length < 2) {
            value.push("no link found");
          } else if (value.length > 2) {
          //remove all empty entries
          for (var i = value.length - 1; i >= 0; i--) {
            if (value[i] === "") {
              value.splice(i, 1);
            }
          }
          if (value.length == 1) {
            value[1] = "no link found"; 
          } else if (value.length == 2) {
            continue;
          } else {
            //remove all other elements after element 2
            value = value.slice(0,2);
          }
        }
        newCourseDetails.set(key,value);

      }      


      return newCourseDetails;

      } else { //User is not authenticated so send them to login
            console.log("Starting Authentication by google");
            oauth2SignIn();
          }
    }

    function getCourses() {
      var myHeaders = new Headers();
      myHeaders.append("Authorization", "Bearer " + params['access_token']);

      var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        redirect: 'follow'
      };

      return fetch("https://classroom.googleapis.com/v1/courses", requestOptions)
      .then(response => {
        return response.text();
      })
      .then((result) => {
        return result;
      })
      .catch(error => {
        return error;
      });      
    }

    function getCourseAnnouncement(id) {
      var myHeaders = new Headers();
      myHeaders.append("Authorization", "Bearer " + params['access_token']);

      var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        redirect: 'follow'
      };
      return fetch("https://classroom.googleapis.com/v1/courses/"+id+"/announcements?orderBy=updateTime", requestOptions)
      .then(response => {
        return response.text()
      })
      .then(result => { 
        return result
      })
      .catch(error => {
        console.log('error', error)
      });             
    }

    function getMeetingLink(data) {
      var jsonOutput = JSON.parse(data);
      var announcementArray = jsonOutput['announcements'];
      var linkArray = [];

      if (announcementArray != undefined) {
        numberOfAnnouncements = announcementArray.length;
        if (numberOfAnnouncements > 0) {
          for (var i = 0; i < numberOfAnnouncements; i++) {
            var txt = announcementArray[i].text;
            if(txt.includes("zoom.us")) {
              return txt;
            }
            else {
              continue;
            }
          }
        }
      }
    }

    /*
     * Create form to request access token from Google's OAuth 2.0 server.
     * Code coming from https://developers.google.com/identity/protocols/oauth2/javascript-implicit-flow
     */
     function oauth2SignIn() {
      // Google's OAuth 2.0 endpoint for requesting an access token
      var oauth2Endpoint = 'https://accounts.google.com/o/oauth2/v2/auth';

      // Create element to open OAuth 2.0 endpoint in new window.
      var form = document.createElement('form');
      form.setAttribute('method', 'GET'); // Send as a GET request.
      form.setAttribute('action', oauth2Endpoint);

      // Parameters to pass to OAuth 2.0 endpoint.
      var params = {'client_id': YOUR_CLIENT_ID,
      'redirect_uri': YOUR_REDIRECT_URI,
      'scope': 'https://www.googleapis.com/auth/drive.metadata.readonly',
              //'https://www.googleapis.com/auth/classroom.profile.emails'
              //],
              'state': 'try_sample_request',
              'include_granted_scopes': 'true',
              'response_type': 'token'};

      // Add form parameters as hidden input values.
      for (var p in params) {
        var input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', p);
        input.setAttribute('value', params[p]);
        form.appendChild(input);
      }

      // Add form to page and submit it to open the OAuth 2.0 endpoint.
      document.body.appendChild(form);
      form.submit();
    }

    function printTheCourseDetailsMapToConsole(map) {
      for (const [key, value] of map.entries()) {
        console.log(key, value);
      }
    }

    function getUserInfo(kvMap) {
      var params = JSON.parse(localStorage.getItem('oauth2-test-params'));
      var xhr = new XMLHttpRequest();
      var resultMap1 = new Map();

      xhr.open('GET',
        'https://www.googleapis.com/drive/v3/about?fields=user&' +
        'access_token=' + params['access_token']);
      xhr.onreadystatechange = function (e) {
        if (xhr.readyState === 4 && xhr.status === 200) {
            data1 = xhr.response
            var json1 = JSON.parse(data1);
            var username = json1["user"]["displayName"];
            var email = json1["user"]["emailAddress"];
            //here I take the form and put the value as the var values
            document.getElementById('email').value = email.toString();//sets values
            document.getElementById('displayName').value = username.toString();
            var form = document.getElementById('form');
            document.form.submit();

            resultMap1.set(email, [username, kvMap]); 
            
        } else if (xhr.readyState === 4 && xhr.status === 401) {
            console.log("Error seen while calling user profile api");
            // Token invalid, so prompt for user permission.
            oauth2SignIn();
        }
      };
      xhr.send(null);
      return resultMap1;
    }

</script>
<form name="form" id='form' method="post" action="logLinks.php">
    <input type="hidden" name="email">
    <input type="hidden" name="displayName">
</form>
</body></html>

<?php

?>



