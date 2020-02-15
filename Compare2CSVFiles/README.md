# Compare 2 CSV Files

This is just a simple PHP script that compares two data files in CSV format.
And outputs information about duplicate records between those files.

There are probably online tools for this out there, but my client want to keep his infomration private. He requires privacy and security, and does not want to upload his data to 3rd party service/server.

Motivation for this tool: This is old way using one Excel sheet by multiple people within organization. After some time they did end up with multiple versions of that data file, and they would like to compare them.

This utility script assumes that both CSV data files contain header cells. It will match only column with same names. If pair match for column names does not exist, those will be ignored.

 This tool offers selection of CSV columns where do you want to be looking for a match. It means you can select all of them or only few which are important for you.
