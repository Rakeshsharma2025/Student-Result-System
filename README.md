# 1️⃣ Home Page / Landing Page

This is the **main interface of the Student Result System website** designed for **Erode Sengunthar Engineering College**.

### Main Features

* College logo and header with navigation menu.
* Menu items:

  * **Home**
  * **Student Login**
  * **Admin Panel**
  * **Directory**
  * **Upload Marks**
  * **Add Students**
  * **Admin Logout**
* Announcement links:

  * Admission Enquiry
  * Information Brochure
  * Admission Contact

### Content Sections

**Achievements Section**

* Displays college achievements such as **TNSkill 2025 results**.
* Shows statistics like:

  * 20 Students
  * 15 Skills
  * 8 Silver medals
  * 12 Gold medals.

**Departments Section**
Shows academic programs:

* Computer Science & Engineering
* Information Technology
* Electronics and Communication Engineering
* Mechanical / Civil / Chemical / Biotechnology
* MBA & MCA programs

**Campus Information Section**
Explains campus facilities such as:

* Academic excellence
* Placement opportunities
* Research facilities.

---

# 2️⃣ Student Login Page

This page allows **students to check their results securely**.

### Fields

* Registration Number
* Date of Birth

### Function

When students enter their details:

* The system checks the **students table in the database**
* Displays their **subject marks, grades, and total results**.

---

# 3️⃣ Admin / Staff Login Page

This page is used by **faculty or administrators**.

### Fields

* Username
* Password

### Function

After login, admins can:

* Add new students
* Upload marks
* Manage student records
* Delete or update data.

---

# 4️⃣ Add Student Page

This page is used by the admin to **register new students into the system**.

### Fields

* Full Name
* Roll Number
* Registration Number
* Department
* Year
* Date of Birth

### Function

When the **Register Student** button is clicked:

* Data is inserted into the **students table in MySQL database**.

---

# 5️⃣ Upload Examination Marks Page

This page allows **bulk uploading of marks using CSV files**.

### CSV Format Required

The file must contain:

```
registration_number
subject_code
internal_marks
external_marks
total
grade
```

### Process

1. Admin selects CSV file.
2. Clicks **Import Marks**.
3. PHP script reads CSV data.
4. Data is stored in the **marks table**.

---

# 6️⃣ Student Directory Page (From PDF)

Your uploaded PDF shows a **directory of all students grouped by department**.

You can open the PDF here:
📄 

### Page 1

Shows **AIDS department students**.

Columns include:

* Roll Number
* Registration Number
* Name
* Date of Birth
* Actions (Upload Marks / Delete)

Example:

| Roll No   | Register No  | Name       | DOB        |
| --------- | ------------ | ---------- | ---------- |
| ES22CS101 | 730422104101 | Student 41 | 2005-03-07 |

There are **20 students in AIDS department**.

---

### Page 2–3

Shows **CSE department students**.

Example:

| Roll No  | Register No  | Name      |
| -------- | ------------ | --------- |
| ES22CS61 | 730422104061 | Student 1 |
| ES22CS62 | 730422104062 | Student 2 |

Total: **20 students**.

---

### Page 4

Shows **IT department students**.

Example:

| Roll No  | Register No  | Name       |
| -------- | ------------ | ---------- |
| ES22CS81 | 730422104081 | Student 21 |
| ES22CS82 | 730422104082 | Student 22 |

Total: **20 students**.

---

# 7️⃣ Database Structure Used

Your project uses **MySQL database in XAMPP**.

### Students Table

Stores student information.

Columns:

* id
* roll_no
* reg_no
* name
* department
* year
* dob

---

### Subjects Table

Stores subject information.

Columns:

* subject_code
* subject_name
* department
* credits

---

### Marks Table

Stores examination results.

Columns:

* student_id
* subject_id
* internal_marks
* external_marks
* total
* grade

---

# 8️⃣ Technologies Used in the Project

| Technology | Purpose            |
| ---------- | ------------------ |
| HTML       | Page structure     |
| CSS        | Styling            |
| JavaScript | Form validation    |
| PHP        | Backend processing |
| MySQL      | Database           |
| XAMPP      | Local server       |

---

# 9️⃣ System Workflow

1️⃣ Admin logs into the portal<img width="1867" height="903" alt="6" src="https://github.com/user-attachments/assets/a35dcd41-f269-41d4-8d97-ff7bf3b75d43" />
<img width="1861" height="910" alt="8" src="https://github.com/user-attachments/assets/ab4ce50f-303f-4878-a69d-1624a059e47c" />
<img width="1887" height="925" alt="1" src="https://github.com/user-attachments/assets/0a649d3c-542f-4dbe-9150-3b3ac20d25f2" />
<img width="1882" height="848" alt="2" src="https://github.com/user-attachments/assets/6d5b860b-b261-489f-8a46-d97b9b42150b" />
<img width="1877" height="914" alt="3" src="https://github.com/user-attachments/assets/9496dcf3-247a-4ea7-aa3f-f2b80c7d18d5" />
<img width="1877" height="916" alt="4" src="https://github.com/user-attachments/assets/33227f04-1eda-4648-a672-4e2a52e84556" />
<img width="1873" height="926" alt="5" src="https://github.com/user-attachments/assets/1f05a4fc-6e5d-45a5-b2b6-acf7642a873d" />
[7.pdf](https://github.com/user-attachments/files/25821473/7.pdf)

2️⃣ Admin adds students to database
3️⃣ Admin uploads marks using CSV
4️⃣ Marks are stored in database
5️⃣ Student logs in with **Reg No + DOB**
6️⃣ System displays **result and grades**

---

# 🔟 Advantages of the System

* Fast result management
* Reduced manual errors
* Easy student access
* Centralized database
* Supports bulk marks upload

  


