# Oresol-Lesotho-Final-Challenge

This repository is intentionally empty, with only a Readme file. Your task if to submit a Pull Request with your version of implementing the task, and your PR will be reviewed by someone on our team.

## The Task: Store locator

You need to create a store locator system with the following funtional features:

LARAVEL Project (Must be PHP >= 8.1)
LEAFLET GOOGLE MAP - MASERU MAP (Show at least 15 locations)

Store types:
- Spaza (Red marker)
- Container (Blue marker)
- Stand alone (Black marker)
- Inside Mall (Green marker)
- Hawker (Purple marker)


**Guest user view:**
- Navbar: Company logo and name (left side), Login (right side)
- Full map with Stores on Map

**Authenticated admin user:**

- Navbar: Company logo and name (left side), Name and surname of admin user (right side) with dropdown menu (Profile - Shows basic Admin details - Check account setting below, Logout)

Sidebar with these page links:

- Dashboard (Default landing page): Shows a full map with stores as map points.
    - Address search
    - Filter points based on type of store
    - Point Legend on Map (Store types)
    - Click on Point - Show (Name, Address, Telephone, Photo, Tags at the bottom of the InfoWindow)

- Manage Points:
    - Manage (meaning, create/update/delete) stores
    - Bulk import of stores from an excel file (User must select matching columns from excel)
    - Store fields:
      - Name
      - Address
      - Telephone
      - Longitude
      - Latitude
      - Type (Spaza, Container, Stand Alone, Inside Mall, Hawker)
      - Photo
      - Tags (ex. New lead, Customer, Negotiation)

- Account settings:

    -  Company section
        -  Company Name
        -  Company Logo
        -  Website
        -  Telephone Number

    -  Personal section
        -  Name and surname
        -  Position
        -  Gender
        -  Email address
        -  Telephone Number
        -  Password management
     
- Manage (meaning, create/update/delete) Store Types
- Manage tags 
        
- For Auth Starter Kit, use [Laravel Breeze](https://github.com/laravel/breeze) (Tailwind) or [Laravel UI](https://github.com/laravel/ui) (Bootstrap) 


**DB Structure:**

- Store name (required), Telephone (required), Type (required), Address - full text (required), Longitude and Latitude (required) and image to upload (required)


-----

## Features to implement

Here's the list of features you need to try to implement in your code:

**Routing and Controllers: Basics**	

- Callback Functions and Route::view()
- Routing to a Single Controller Method	
- Route Parameters
- Route Naming	
- Route Groups	


**Blade Basics**

- Displaying Variables in Blade
- Blade If-Else and Loop Structures
- Blade Loops
- Layout: @include, @extends, @section, @yield
- Blade Components


**Auth Basics**	

- Default Auth Model and Access its Fields from Anywhere
- Check Auth in Controller / Blade
- Auth Middleware


**Database Basics**	

- Database Migrations
- Basic Eloquent Model and MVC: Controller -> Model -> View
- Eloquent Relationships: belongsTo / hasMany / belongsToMany
- Eager Loading and N+1 Query Problem


**Full Simple CRUD**	

- Route Resource and Resourceful Controllers
- Forms, Validation and Form Requests
- File Uploads and Storage Folder Basics
- Table Pagination

