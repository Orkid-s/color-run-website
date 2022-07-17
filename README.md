# Color Run Website using Basic PHP 
This website allow the participants to register to the event using online method. It offers two sorts of interfaces based on two roles: administrator and participant.

Below are the brief description on the functional features for each role: :point_down::point_down:

## Administrator Role :one:
- CREATE default account for admin using MYSQL
- Login/ logout with SESSION (authentication)
  - Use required form attribute or JavaScript function check(), to make sure that all field need to be entered before submit. If one of the text fields is blank, display a dialog message “Please enter all fields” and stop submission.
- Allow the admin to find registered participant/user (search function)

## Participant Role :two:
- Allow user to register as participant (insert function)
  - The form must have at least :-
    1. Username
    2. Password
    3. Other relevant information
    4. Use “required” form attribute or JavaScript function check(), to will make sure that all fields need to be entered before submit. If one of the text fields is blank, display a dialog message “Please enter all fields” and stop submission.
- Login/ logout with SESSION (authentication)
  - Use “required” form attribute or JavaScript function check(), to will make sure that all field need to be entered before submit. If one of the text fields is blank, display a dialog message “Please enter all fields” and stop submission.
- Once user log on, the page will display his user profile

## Video Demo 
This video below shows a fully functional website on localhost.
[Click Here](https://youtu.be/bdtgA8p72Js)
