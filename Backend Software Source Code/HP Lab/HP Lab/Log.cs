using System;
using System.IO;

namespace HP_Lab
{
    public class Log // Class for managing log messages.
    {
        public static Database Database = new Database();

        /// <summary>
        /// Appends a log entry with the current timestamp and specified message to a log file and database.
        /// </summary>
        /// <param name="Log">The message to be logged.</param>
        public void AppendLog(string Log)
        {
            try
            {
                // Create a "Log" directory if it doesn't exist.
                Directory.CreateDirectory("Log");

                // Append the log entry to a log file with the current date as the filename.
                File.AppendAllText(Path.Combine("Log", DateTime.Now.ToString("dd-MM-yyyy") + ".log"), DateTime.Now.ToString("hh:mm:ss tt") + " - " + Log + Environment.NewLine);

                // Insert the log entry into the "Main.hp_error_log" table in the database.
                Database.ExecuteQuery("INSERT INTO \"Main\".hp_error_log (date_time, error_log) VALUES ('" + DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss") + "','" + Log + "')");
            }
            catch (Exception Exception)
            {
                // Create a "Log" directory if it doesn't exist.
                Directory.CreateDirectory("ErrorLog");

                // Append the log entry to a log file with the current date as the filename.
                File.AppendAllText(Path.Combine("ErrorLog", DateTime.Now.ToString("dd-MM-yyyy") + ".log"), DateTime.Now.ToString("hh:mm:ss tt") + " - " + Exception.Message + Environment.NewLine);
            }
        }
    }
}