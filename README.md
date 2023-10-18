![](./extracted_images/media/image1.jpeg)

Hidalgo Hotel Website

Rafael Hidalgo

Montclair State University

Web Development

Dr. Jenq

CSIT537-01

# Contents

[Description of Hotel System
[3](#description-of-hotel-system)]

[System Components [4](#system-components)]

[Database Design [4](#database-design)]

[Assumptions [5](#assumptions)]

[Version 1 ERD [7](#version-1-erd)]

[Version 2 ERD [9](#version-2-erd)]

[Version 3 ERD [10](#version-3-erd)]

[Relational Schema [11](#relational-schema)]

[MVC [12](#mvc)]

[Testing [12](#testing)]

[Test Plan: User Interface Testing
[12](#test-plan-user-interface-testing)]

[Objectives: [12](#objectives)]

[Scope: [12](#scope)]

[Test Cases: [13](#test-cases)]

[Test Steps: [13](#test-steps)]

[Expected Results: [15](#expected-results)]

[Actual Results: [15](#actual-results)]

[Test Discussion [44](#test-discussion)]

[Conclusion [45](#conclusion)]

[References [45](#references)]

[Video Link For Demo [45](#video-link-for-demo)]

# Description of Hotel System

The hotel booking system is a comprehensive web application that
facilitates a wide range of functionalities for guests and hotel staff.
It is built using several programming languages including PHP, HTML,
CSS, and JavaScript, and it utilizes a MySQL database to store relevant
information. The system enables guests to register and create an account
by providing their personal information. This enables them to log in and
make future bookings more efficiently.

The room booking component of the system is one of the most critical
functionalities. Guests can search for available rooms based on their
preferred check-in and check-out dates, room type, and number of
occupants. The system ensures that rooms are not double-booked by
checking the check-in and check-out dates of other bookings. Once guests
have selected their preferred room, they can complete their booking and
receive a confirmation number.

In addition to the room booking functionality, the system also allows
guests to search for their reservation details without having to log in.
This component of the system is crucial for guests who may have
forgotten their login credentials or who have lost their confirmation
number.

The Admin Panel is another essential component of the hotel booking
system. It allows hotel staff to manage the system efficiently. The
admin panel enables staff to view room information, edit room
information, add new rooms, and delete rooms from the system. The Admin
Panel is password protected to ensure that only authorized personnel
have access to it.

The security and privacy of guest information is paramount to the
system. To ensure this, the system implements password hashing and
encryption when storing sensitive data in the database. This ensures
that guest information is secure and cannot be easily accessed by
unauthorized personnel.

Overall, the hotel booking system is user-friendly and convenient for
guests while enabling hotel staff to manage the system efficiently. The
system provides a comprehensive set of functionalities, including guest
registration, room booking, reservation search, and an admin panel.

# System Components

## Database Design

In the hotel booking system, the database design is an important
component that ensures the system functions efficiently and accurately.
To design the database, a list of assumptions was first made using the
project requirements. Once the assumptions were made, three versions of
an entity relationship diagram (ERD) were made. Finally, with the ERD's
ready, a relationship diagram was made to help us visualize how our data
will look once it is in SQL.

Assumptions are made to help visualize how the database system should
look and how the components of a database should interact with one
another. They serve as a starting point for creating the database
schema, and they help to identify the necessary entities and attributes
required to store and manage the data. Assumptions also help to identify
any potential problems or limitations that may arise during the database
design process.

After the assumptions the first version of the entity relationship
diagram (ERD) was created to identify each entity individually and
determine the attributes associated with it. Entities such as guests,
rooms, reservations, and admins were identified, and attributes such as
guest names, room numbers, check-in and check-out dates, and admin login
details were identified for each entity. The second version of the ERD
was created to visualize the relationship between the entities and to
eliminate any redundant relationships.

The final version of the ERD was created to view the constraints and
cardinalities of each relationship. This helped to identify which
attributes should be used as keys to ensure data integrity and accuracy.
For example, the reserve_room entity has a composite key consisting of
the confirmation ID and room number. This helps us monitor what rooms
are reserved and at that time.

Finally a relationship diagram was made by consolidating all of the
ERD's and assumptions. With a relationship diagram, were are able to
visualize what schemas required foreign keys, and what relationships
should be treated as schema themselves. This ultimately helps us to make
a reliable database with the least amount of resources as possible.
Please see below for the assumptions, ERD's and relationship diagram
used.

### Assumptions

1.  Room

    1.  [Room_number]{.underline}

    2.  Room_type

    3.  {Room_imgs}

    4.  Room_availability

    5.  Max_occupancy

    6.  Price_per_night

2.  Guest User

    1.  Has Name

        1.  First

        2.  Middle

        3.  Last

    2.  Address

        1.  Apartment Number

        2.  Street Number

        3.  Street Name

        4.  City

        5.  Zip Code

        6.  State

        7.  Country

    3.  {Has Phone Number}

    4.  {Has Email Address}

    5.  User_name

    6.  Password

    7.  [User I.D.]{.underline}

3.  Reservation

    1.  [Confirmation number]{.underline}

    2.  Check in Date

    3.  Check out Date

    4.  Number of adults

    5.  Number of Children

    6.  Total_cost

    7.  Time stamp created

4.  Admin User

    1.  Has Name

        1.  First

        2.  Middle

        3.  Last

    2.  Address

        1.  Apartment Number

        2.  Street Number

        3.  Street Name

        4.  City

        5.  Zip Code

        6.  State

        7.  Country

    3.  {Has Phone Number}

    4.  {Has Email Address}

    5.  User_name

    6.  Password

    7.  [User I.D.]{.underline}

[Interactions of hotel Database]{.underline}

Admin User manages rooms

Admin User can manage reservation

Guest User can book Reservations

Reservations reserve a room.

### Version 1 ERD

![Diagram, schematic Description automatically
generated](./extracted_images/media/image2.png){width="6.5in"
height="5.395833333333333in"}

### 

### Version 2 ERD

![Diagram, schematic, map Description automatically
generated](./extracted_images/media/image3.png){width="6.5in"
height="4.742361111111111in"}

### 

### 

### 

### Version 3 ERD

![Map Description automatically
generated](./extracted_images/media/image4.png){width="6.5in"
height="4.653472222222222in"}

### Relational Schema

![Graphical user interface Description automatically
generated](./extracted_images/media/image5.png){width="6.5in"
height="7.929166666666666in"}

## MVC

The hotel management system employs SQL queries, HTML, and PHP to
implement an MVC (Model-View-Controller) structure. This structure is
characterized by dividing the application into three separate
components. The first component, the model, represents the business
logic of the system. It comprises the database schema and all the
methods for interacting with the database. In the hotel management
system, the model incorporates tables for reservations, rooms, guests,
and other necessary information. The model is basically the SQL database
itself, along with the PHP code and PDO/SQL commands used to retrieve
the data,

The second component is the view, which handles the user interface and
presentation of data to the user. In the hotel management system, the
view includes the HTML templates and CSS stylesheets for displaying
information about reservations, rooms, and guests.

The third component is the controller, which manages the flow of data
between the model and the view. The controller contains the application
logic for handling user input and generating appropriate responses. In
the hotel management system, the controller receives user input from the
search form and uses the model to retrieve and display reservation data
in the view. This was done mostly by using PHP.

# Testing

## Test Plan: User Interface Testing

### Objectives:

-   To ensure that the user interface of the hotel management system is
    user-friendly and intuitive.

-   To ensure that all the functionalities of the system are easily
    accessible to the users.

-   To ensure that the system is responsive and works well on different
    devices and screen sizes.

### Scope:

-   The testing will be performed on the user and admin interface of the
    hotel management system.

-   The testing will include both desktop and mobile versions of the
    system.

### Test Cases:

1.  Navigation: Test the navigation of the system to ensure that all the
    functionalities of the system can be easily accessed by the users.
    Verify that all links and buttons are working correctly and that
    they lead to the appropriate pages.

2.  User Input: Test the input fields of the system to ensure that they
    are working correctly and that the users can input their information
    without any errors. Verify that input fields have appropriate labels
    and placeholders.

3.  Responsiveness: Test the responsiveness of the system to ensure that
    it works well on different devices and screen sizes. Verify that the
    system\'s layout adjusts appropriately to different screen sizes.

4.  User Feedback: Test the feedback mechanisms of the system to ensure
    that the users are notified of any errors or successful actions.
    Verify that error messages are clear and concise and that success
    messages are displayed appropriately.

### Test Steps:

#### User

##### Navigation:

a.  Click on login button on the homepage. Verify that the login page is
    loaded.

b.  Click on Register button on the login page. Verify that the
    registration page is loaded.

c.  Click on Rooms button on the homepage. Verify that the Rooms page is
    loaded.

d.  Click on the Reservation Search page. Verify the page is loaded.

e.  Click on Facilities, Local Travel, and Fine Dining buttons on the
    homepage. Verify that the respective pages are loaded.

f.  In the Rooms Page, Click on Book Now while the user is logged off.
    Verify that the user is redirected to the login page.

g.  Click on Book Now! button on the Rooms page while the user is logged
    on. Verify that the user is redirected to the booking page.

##### Input Data:

a.  Enter valid details in the registration form and click on the
    register button. Verify that the user is registered and redirected
    to the login page.

b.  Enter valid credentials in the login form and click on the login
    button. Verify that the user is logged in and redirected to the
    homepage.

c.  In the Rooms page, enter valid check-in and check-out dates, room
    type, and click on the Book Now! button. Verify that the booking is
    confirmed, and the user is redirected to the booking page.

d.  In the booking page, input 1 adult and 1 child. Click on book now.
    Should bring you to the confirmation page.

##### Responsive Design:

a.  Resize the browser window to various screen sizes and verify that
    the layout adjusts accordingly.

##### Error Handling:

a.  Enter invalid credentials in the login form and click on the login
    button. Verify that the system displays an error message.

b.  Submit the registration form with invalid details and verify that
    the system displays appropriate error messages.

c.  In the booking page submit the booking form with invalid details and
    verify that the system displays appropriate error messages.

#### Admin

##### Navigation:

a.  Log in to the admin panel and verify that the dashboard is loaded.

b.  Click on Rooms on the sidebar menu. Click on Add Room and Edit.
    Verify that the respective pages are loaded.

##### Input Data:

a.  Add a new room by filling in the necessary details in the Add Room
    form and clicking on the Add Room button. Verify that the room is
    added to the system.

b.  Update the details of an existing room by editing the details in the
    Edit Room form and clicking on the Edit Room button. Verify that the
    room details are updated.

c.  Delete a room by clicking on the Delete button for that room in the
    Rooms page and verifying that the room is removed from the system.

##### Responsive Design:

a.  Resize the browser window to various screen sizes and verify that
    the layout adjusts accordingly.

##### Error Handling:

a.  Add a new room with invalid details and verify that the system
    displays appropriate error messages.

b.  Update the details of a room with invalid details and verify that
    the system displays appropriate error messages.

c.  Attempt to delete a room that has active bookings and verify that
    the system displays an appropriate error message.

### Expected Results:

-   The system\'s user interface should be intuitive and easy to use.

-   The system should be responsive and work well on different devices
    and screen sizes.

-   The system should provide clear and concise feedback to the users.

### Actual Results:

#### User

##### Navigation:

a.  Click on login button on the homepage. Verify that the login page is
    loaded.

 ![Graphical user interface, application Description automatically
 generated](./extracted_images/media/image6.png){width="6.5in"
 height="5.839583333333334in"}

b.  Click on Register button on the login page. Verify that the
    registration page is loaded.

 ![Graphical user interface, application Description automatically
 generated](./extracted_images/media/image7.png){width="5.763888888888889in"
 height="7.924305555555556in"}

c.  Click on Rooms button on the homepage. Verify that the Rooms page is
    loaded.

 ![Graphical user interface, website Description automatically
 generated](./extracted_images/media/image8.png){width="6.5in"
 height="5.170138888888889in"}

d.  Click on the Reservation Search page. Verify the page is loaded.

 ![Graphical user interface, text, application, email Description
 automatically
 generated](./extracted_images/media/image9.png){width="6.5in"
 height="1.4625in"}

e.  Click on Facilities, Local Travel, and Fine Dining buttons on the
    homepage. Verify that the respective pages are loaded.

 ![Graphical user interface, text, application, email Description
 automatically
 generated](./extracted_images/media/image9.png){width="6.5in"
 height="1.4625in"}

f.  In the Rooms Page, Click on Book Now while the user is logged off.
    Verify that the user is redirected to the login page.

 ![Graphical user interface Description automatically
 generated](./extracted_images/media/image10.png){width="4.509722222222222in"
 height="4.226388888888889in"}

g.  Click on Book Now! button on the Rooms page while the user is logged
    on. Verify that the user is redirected to the booking page.

 ![Graphical user interface Description automatically generated with
 medium confidence](./extracted_images/media/image11.png){width="6.5in"
 height="6.4625in"}

##### Input Data:

a.  Enter valid details in the registration form and click on the
    register button. Verify that the user is registered and redirected
    to the login page.

 ![Graphical user interface Description automatically
 generated](./extracted_images/media/image12.png){width="6.5in"
 height="5.754861111111111in"}

b.  Enter valid credentials in the login form and click on the login
    button. Verify that the user is logged in and redirected to the
    homepage.

 ![Graphical user interface Description automatically
 generated](./extracted_images/media/image12.png){width="6.5in"
 height="5.754861111111111in"}

c.  In the Rooms page, enter valid check-in and check-out dates, room
    type, and click on the Book Now! button. Verify that the booking is
    confirmed, and the user is redirected to the booking page.

 ![Graphical user interface, text Description automatically
 generated](./extracted_images/media/image13.png){width="6.5in"
 height="4.613194444444445in"}

d.  In the booking page, input 1 adult and 1 child. Click on book now.
    Should bring you to the confirmation page.

 ![Graphical user interface Description automatically
 generated](./extracted_images/media/image14.png){width="6.5in"
 height="4.707638888888889in"}

##### Responsive Design:

a.  Resize the browser window to various screen sizes and verify that
    the layout adjusts accordingly.

![Graphical user interface, application Description automatically
generated](./extracted_images/media/image15.png){width="3.707638888888889in"
height="2.839583333333333in"} ![Graphical user interface, application
Description automatically
generated](./extracted_images/media/image16.png){width="2.160416666666667in"
height="3.3208333333333333in"}

##### Error Handling:

b.  Enter invalid credentials in the login form and click on the login
    button. Verify that the system displays an error message.

 ![Graphical user interface, website Description automatically
 generated](./extracted_images/media/image17.png){width="5.424305555555556in"
 height="4.886805555555555in"}

c.  Submit the registration form with invalid details and verify that
    the system displays appropriate error messages.

 ![Graphical user interface, text, application Description
 automatically
 generated](./extracted_images/media/image18.png){width="4.254861111111111in"
 height="1.9625in"}

 ![Graphical user interface, text, application Description
 automatically
 generated](./extracted_images/media/image19.png){width="4.915277777777778in"
 height="1.0659722222222223in"}

d.  In the booking page submit the booking form with invalid details and
    verify that the system displays appropriate error messages.

 ![Graphical user interface, text, application, email Description
 automatically
 generated](./extracted_images/media/image20.png){width="6.5in"
 height="2.207638888888889in"}

 ![Graphical user interface, application, Word Description
 automatically
 generated](./extracted_images/media/image21.png){width="6.5in"
 height="1.3680555555555556in"}

#### Admin

##### Navigation:

a.  Log in to the admin panel and verify that the dashboard is loaded.

 ![Graphical user interface Description automatically
 generated](./extracted_images/media/image22.png){width="6.05292760279965in"
 height="4.458955599300087in"}

![Text Description automatically
generated](./extracted_images/media/image23.png){width="6.5in"
height="4.864583333333333in"}

b.  Click on Rooms on the sidebar menu. Click on Add Room and Edit.
    Verify that the respective pages are loaded.

 ![Graphical user interface, text, website Description automatically
 generated](./extracted_images/media/image24.png){width="6.5in"
 height="4.704166666666667in"}

![A screenshot of a computer Description automatically
generated](./extracted_images/media/image25.png){width="6.5in"
height="6.206944444444445in"}

![A screenshot of a computer Description automatically generated with
medium confidence](./extracted_images/media/image26.png){width="6.5in"
height="6.94375in"}

##### Input Data:

d.  Add a new room by filling in the necessary details in the Add Room
    form and clicking on the Add Room button. Verify that the room is
    added to the system.

![A screenshot of a computer Description automatically
generated](./extracted_images/media/image27.png){width="6.5in"
height="5.932638888888889in"}

![A screenshot of a computer Description automatically generated with
medium confidence](./extracted_images/media/image28.png){width="6.5in"
height="5.8590277777777775in"}

e.  Update the details of an existing room by editing the details in the
    Edit Room form and clicking on the Edit Room button. Verify that the
    room details are updated.

![Graphical user interface, website Description automatically
generated](./extracted_images/media/image29.png){width="6.5in"
height="6.952083333333333in"}

![Graphical user interface, text, website Description automatically
generated](./extracted_images/media/image30.png){width="6.5in"
height="6.825694444444444in"}

f.  Delete a room by clicking on the Delete button for that room in the
    Rooms page and verifying that the room is removed from the system.

![Graphical user interface Description automatically
generated](./extracted_images/media/image31.png){width="6.5in"
height="5.942361111111111in"}

![Graphical user interface, text Description automatically
generated](./extracted_images/media/image32.png){width="6.5in"
height="5.96875in"}

##### Responsive Design:

b.  Resize the browser window to various screen sizes and verify that
    the layout adjusts accordingly.

![Graphical user interface Description automatically
generated](./extracted_images/media/image33.png){width="6.33421697287839in"
height="7.667736220472441in"}

##### Error Handling:

d.  Add a new room with invalid details and verify that the system
    displays appropriate error messages.

![A screenshot of a computer Description automatically
generated](./extracted_images/media/image34.png){width="6.5in"
height="6.199305555555555in"}

![A screenshot of a computer Description automatically generated with
medium confidence](./extracted_images/media/image35.png){width="6.5in"
height="5.773611111111111in"}

e.  Update the details of a room with invalid details and verify that
    the system displays appropriate error messages.

![A screenshot of a computer Description automatically generated with
medium confidence](./extracted_images/media/image36.png){width="6.5in"
height="6.908333333333333in"}

![A computer screen capture Description automatically generated with
medium confidence](./extracted_images/media/image37.png){width="6.5in"
height="6.9006944444444445in"}

![Graphical user interface, text, timeline Description automatically
generated](./extracted_images/media/image38.png){width="6.5in"
height="6.844444444444444in"}

### Test Discussion

#### User

Upon testing the User system, no apparent bugs were found. Please note
however that any bugs found during development were fixed and accounted
for at the time of development.

#### Admin

Some bugs were found when testing the admin system. Namely the way the
admin system interacts with negative numbers. For instance, upon
inputting a negative number for the price of a room, the system accept
the number. This is obviously a problem since the hotel would need to
pay the guest for staying with them. These bugs will be accounted for
prior to future test runs.

# Conclusion

In conclusion, the hotel management system is a comprehensive web
application that provides a wide range of functionalities for both
guests and hotel staff. The system\'s critical components include room
booking, reservation search, and the admin panel, which allows hotel
staff to manage the system efficiently. The system\'s security features,
such as password hashing and encryption, ensure that guest information
is protected from unauthorized access. The system is user-friendly and
intuitive, making it easy for guests to navigate and make bookings
efficiently. The system's testing phase of the user view was completely
successful. However, there still is work to be done in the admin side to
make it completely viable.

# References

<https://www.youtube.com/watch?v=BLqDewjag48&list=PLWxTHN2c_6cbh1C7yIskoXszoTl-okogt&index=3&ab_channel=TJWEBDEV>

# Video Link For Demo

<https://youtu.be/rNu2pauM7HY>
