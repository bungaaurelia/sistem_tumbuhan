# Sistem Informasi Pendataan dan Identifikasi Tumbuhan dengan QR Code

This project is a web-based system designed to manage the data and identification of plants using QR codes. The system allows users to create, edit, view, and delete plant records, which include common and scientific names, descriptions, habitats, images, and automatically generated QR codes. It also provides features for searching, paginating, and downloading plant data in both Excel and PDF formats.

## Features

- **CRUD Operations**: Create, Read, Update, and Delete plant records.
- **QR Code Generation**: Automatically generate QR codes for each plant.
- **Responsive Design**: Elegant and responsive interface with a fixed sidebar and navbar.
- **Data Export**: Download plant data in Excel format and detailed view in PDF format.
- **Search and Pagination**: Search plant records and paginate results.
- **Image Upload**: Upload plant images with automatic file naming based on the plant's common name.

## Technologies Used

- **Frontend**:
  - HTML, CSS, JavaScript
  - Bootstrap for styling and responsive design
  - Google Fonts for custom fonts (e.g., Times New Roman)

- **Backend**:
  - PHP for server-side scripting
  - PDO for database interactions

- **Database**:
  - MySQL

- **QR Code Generation**:
  - PHP QR Code library

## Installation

### Prerequisites

- PHP 7.x or higher
- MySQL
- Composer (for managing PHP dependencies)
- Web server (e.g., Apache, Nginx)

### Steps

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/your-username/repository-name.git
    ```

2. Navigate to the Project Directory:
    ```
    cd repository-name
    ```

3. Install Dependencies: If you’re using Composer for dependency management, run:
    ```
    composer install
    ```

4. Set Up the Database:
    - Create a new MySQL database.
    - Import the SQL file provided in the database folder.
    - Update the tumbuhan_db.php file with your database credentials.

5. Run the Application:
    - Deploy the project on your local or online server.
    - Access the system via your browser (e.g., http://localhost/sistem_tumbuhan).

## Usage

### Create a New Plant Record

1. Navigate to the "Create" menu.
2. Fill in the plant details, including the common name, scientific name, description, habitat, and image.
3. Submit the form to generate a new plant record along with its QR code.

### Edit an Existing Plant Record

1. Go to the "List" menu.
2. Find the plant you want to edit and click the "Edit" button.
3. Update the details as needed and submit the form.

### View a Plant Record

1. Go to the "List" menu.
2. Click the "View" button next to the plant you want to view.
3. The details of the plant, including the QR code and image, will be displayed.

### Delete a Plant Record

1. Go to the "List" menu.
2. Click the "Delete" button next to the plant you want to delete.
3. Confirm the deletion.

### Download Plant Data

1. Excel: Download the list of plants as an Excel file.
2. PDF: Download detailed information of a specific plant as a PDF, including the image and QR code.

## Contributing

Feel free to fork this repository and submit pull requests if you want to contribute to the project. Contributions are always welcome!

## License

This project is licensed under the MIT License.

## Contact
For any inquiries or issues, please contact me at annisabungaaurelia99@gmail.com.