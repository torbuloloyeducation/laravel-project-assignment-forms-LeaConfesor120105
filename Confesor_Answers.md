# Activity 2: Forms in Laravel - Answers

## Task 1: Understanding the Flow
        When the user types an email and clicks **Save**, the form submits a **POST request** to the server which stores the email in the **session**. Laravel then redirects back to the page where the **GET route** re-reads the session and passes the email list to the formtest.blade. the formtest.blade then displays all saved emails using **@foreach**.


## Reflection Questions

### 1. What is the difference between GET and POST?
        The difference between GET and POST is that GET is used to **retrieve** data from the server, while POST is used to **sumbit** data to the server.

### 2. Why do we use `@csrf` in forms?
        We use @csrf to protect the form from **Cross-Site Request Forgery (CSRF) attacks**. It generates a hidden token that Laravel checks every time a form is submitted.

### 3. What is session used for in this activity?
        In this activity, session is used to remember the list of emails that the user has added. Since websites forget everything after each page load, the session acts like a temporary notebook that stores the emails so they still appear on the page after refreshing. 

### 4. What happens if session is cleared?
        If the session is cleared, all the stored emails will disappear. The page will reload showing an empty email list as if no emails were ever added, beacuse the session is only temporary storage and not saved in a database.

        