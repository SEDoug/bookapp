import xlrd
import MySQLdb

# Open the workbook and define the worksheet
book = xlrd.open_workbook("excel-python-mysql_rev1.xls")
#sheet = book.sheet_by_name("source")
sheet = book.sheet_by_index(0)

# Establish a MySQL connection
database = MySQLdb.connect (host="localhost", user = "root", passwd = "123456", db = "books", use_unicode=True, charset="utf8")
# to secure the password above consider setting the path to a user configuration file using: read_default_file

# Get the cursor, which is used to traverse the database, line by line
cursor = database.cursor()

# Create the INSERT INFO sql query
query = """INSERT INTO books (author_details, title, isbn, publisher, date_published, pages, list_price, format, date_added, book_uuid) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"""

# Create a For loop to iterate through each row in the XLS file, starting at row 2 to skip the headers
for r in range(1, sheet.nrows):
	author_details		= sheet.cell(r,1).value
	title				= sheet.cell(r,2).value
	isbn				= sheet.cell(r,3).value
	publisher			= sheet.cell(r,4).value
	date_published		= sheet.cell(r,5).value
	pages				= sheet.cell(r,6).value
	list_price			= sheet.cell(r,7).value
	format				= sheet.cell(r,8).value
	date_added			= sheet.cell(r,9).value
	book_uuid			= sheet.cell(r,10).value

	# Assign values for each row
	values = (author_details, title, isbn, publisher, date_published, pages, list_price, format, date_added, book_uuid)

	# Execute sql Query
	cursor.execute(query, values)

# Close the cursor
cursor.close()

# Commit the transaction
database.commit()

# Close the database connection
database.close()

# Print Results
print ""
print "All done! Exiting now."
columns = str(sheet.ncols)
rows = str(sheet.nrows)
print "I just imported " + columns + " columns and " + rows + " rows to MySQL!"
