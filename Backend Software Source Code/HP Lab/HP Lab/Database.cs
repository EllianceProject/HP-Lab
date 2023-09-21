using Npgsql;
using System;
using System.Data;

namespace HP_Lab
{
    public class Database // Class for database operations.
    {
        // Log instance for managing log messages related to database operations.
        public static Log Log = new Log();

        /// <summary>
        /// Executes an SQL query on the database using the provided SQL statement.
        /// </summary>
        /// <param name="SQL">The SQL query statement to execute.</param>
        public void ExecuteQuery(string SQL)
        {
            try
            {
                // Create a new NpgsqlConnection using the database connection string from the INIFile class.
                using (var Connection = new NpgsqlConnection(INIFile.DatabaseConnection))
                {
                    // Open the database connection.
                    Connection.Open();

                    // Create a new NpgsqlCommand with the SQL query and connection.
                    using (var Command = new NpgsqlCommand(SQL, Connection))
                    {
                        // Execute the SQL query.
                        Command.ExecuteNonQuery();
                    }
                }
            }
            catch (Exception Exception)
            {
                // Log any exceptions that occur during the operation
                Log.AppendLog(Exception.GetType().Name + " : " + Exception.Message);
            }
        }

        /// <summary>
        /// Retrieves records from the database using the provided SQL query.
        /// </summary>
        /// <param name="SQL">The SQL query to retrieve records.</param>
        /// <returns>A DataTable containing the retrieved records.</returns>
        public DataTable GetRecords(string SQL)
        {
            // Create a new DataTable to store the retrieved records.
            DataTable DataTable = new DataTable();

            // Create a new NpgsqlConnection using the database connection string from the INIFile class.
            using (var Connection = new NpgsqlConnection(INIFile.DatabaseConnection))
            {
                // Create a new NpgsqlDataAdapter with the SQL query and connection.
                using (var DataAdapter = new NpgsqlDataAdapter(SQL, Connection))
                {
                    try
                    {
                        // Fill the DataTable with the retrieved records.
                        DataAdapter.Fill(DataTable);
                    }
                    catch (Exception Exception)
                    {
                        // Log any exceptions that occur during the operation
                        Log.AppendLog(Exception.GetType().Name + " : " + Exception.Message);
                    }
                }
            }

            // Return the populated DataTable.
            return DataTable;
        }
    }
}