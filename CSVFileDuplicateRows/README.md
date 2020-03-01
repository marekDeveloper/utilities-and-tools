# Find duplicate rows in CSV File

This is just a simple PHP script that will find "duplicate rows" in one data file in CSV format.
And outputs information about duplicate records/rows.

There are probably online tools for this out there, but my client want to keep his infomration private. He requires privacy and security, and does not want to upload his data to 3rd party service/server.

Motivation for this tool: This is old way using one Excel sheet by multiple people within organization. After some time CSV data file now conrinas over 10,000 records and few records are there multiple times. Some of those records are exactly same but few only have changes in some columns. Instead of updating exiting row new rows were added with updated information.

This tool offers selection of CSV columns where do you want to be looking for duplicate values. It means you can select all of them or only few which are important to you.

This tool does not offer files upload option, I think that can be improved later. We provide one simple CSV data file example in "csv-data" directory.
