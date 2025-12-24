# LuxRide
CTF Challnege 

## Description

LuxRide is an exclusive luxury car rental platform.
They’ve recently launched a new user portal, but something seems… misaligned.
Can you find a way to get into the admin panel and uncover what’s hidden behind the velvet rope?

Hints:
HINT 1: "Sometimes, being too strict with input length backfires..."

HINT 2: "Truncation is just another word for ‘oops’."

HINT 3: "Who needs an XSS payload when the flag is already a global variable?"

WALKTHROUGH:

The LuxRide challenge demonstrates how overly strict input validation, combined with unsafe backend assumptions, can lead to privilege escalation and sensitive data exposure

The intended solution abuses:

-Username length truncation during registration
-Authentication logic mismatch
-Admin panel access
-Client-side exposure of the flag via a global variable


Step 1-
Access the Application
You’ll be presented with the LuxRide landing page and user authentication options.

Step 2:
Register a New User
Navigate to the Register page and create a new account.

At this stage, the application appears to enforce:
A maximum username length
Standard registration validation
However, this validation is inconsistent between frontend and backend.

Step 3:

Capture the Registration Request

Using an intercepting proxy (Burp Suite / similar):
Intercept the register request
Observe the payload sent to the backend
The backend stores usernames in a fixed-length database field, causing silent truncation when input exceeds the limit.

Step 4:
Exploit Username Truncation - 

Craft a username such that:
The stored value truncates to an existing privileged username (e.g., admin)
The password is attacker-controlled
This results in admin password reset via truncation collision.

Step 5:

Login as Admin
Using the crafted credentials:
Navigate to the Login page
Authenticate using the truncated username and attacker-defined password
Successful login grants access to the Admin Panel.

Step 6:
Access the Admin Panel
Once logged in as admin:
Navigate to the admin dashboard
Observe hints related to flag generation and frontend logic
The UI subtly hints that the flag is not securely stored server-side.

Step 7-
Analyze Client-Side Behavior

Inspect the page source or browser developer tools.

Observation:

The flag is assigned to a global JavaScript variable
No server-side authorization check is required to retrieve it

Step 8-
Extract the Flag ((Actual flag depends on the FLAG environment variable used at runtime).
