# Color Run Website using Basic PHP 
This website allow the participants to register to the event using online method. It has two types of interface based on two roles which are administrator role and participant role.

Below are the brief description on the functional features for each role:

## Administrator Role
- CREATE default account for admin using MYSQL
- Login/ logout with SESSION (authentication)
  - Use required form attribute or JavaScript function check(), to make sure that all field need to be entered before submit. If one of the text fields is blank, display a dialog message “Please enter all fields” and stop submission.
- Allow the admin to find registered participant/user (search function)

## Participant Role
- Allow user to register as participant (insert function)
  - The form must have at least :-
    1. Username
    2. Password
    3. Other relevant information
    4. Use “required” form attribute or JavaScript function check(), to will make sure that all fields need to be entered before submit. If one of the text fields is blank, display a dialog message “Please enter all fields” and stop submission.
- Login/ logout with SESSION (authentication)
  - Use “required” form attribute or JavaScript function check(), to will make sure that all field need to be entered before submit. If one of the text fields is blank, display a dialog message “Please enter all fields” and stop submission.
- Once user log on, the page will display his user profile

