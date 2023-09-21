using System.Text;
using System.Runtime.InteropServices;

namespace HP_Lab
{
    public class INIFile // Class for reading values from an INI configuration file.
    {      
        // String to store the database connection string read from the INI file.
        public static string DatabaseConnection;

        // String to store the path of the INI file.
        public static string Path;

        // Import the GetPrivateProfileString function from the kernel32.dll library.
        [DllImport("kernel32")]
        private static extern int GetPrivateProfileString(string section, string key, string def, StringBuilder retVal, int size, string filePath);

        public INIFile(string INIPath)
        {
            // Constructor for the INIFile class.
            // Parameters:
            // INIPath: The path to the INI configuration file.

            // Set the Path property to the provided INI path.
            Path = INIPath;
        }

        /// <summary>
        /// Reads a value from the INI file.
        /// </summary>
        /// <param name="Section">The name of the section in the INI file.</param>
        /// <param name="Key">The name of the key whose value you want to retrieve.</param>
        /// <param name="Default">The default value to return if the key is not found.</param>
        /// <returns>The value associated with the specified key in the specified section of the INI file.</returns>
        public string ReadValue(string Section, string Key, string Default)
        {
            // Create a StringBuilder to store the retrieved value.
            StringBuilder buffer = new StringBuilder(255);

            // Call the GetPrivateProfileString function to retrieve the value from the INI file.
            GetPrivateProfileString(Section, Key, Default, buffer, 255, Path);

            // Return the retrieved value as a string.
            return buffer.ToString();
        }

        /// <summary>
        /// Reads a value from the INI file.
        /// </summary>
        /// <param name="Section">The name of the section in the INI file.</param>
        /// <param name="Key">The name of the key whose value you want to retrieve.</param>
        /// <param name="Default">The default value to return if the key is not found.</param>
        /// <returns>The value associated with the specified key in the specified section of the INI file.</returns>
        public int ReadValue(string Section, string Key, int Default)
        {
            // Create a StringBuilder to store the retrieved value.
            StringBuilder Buffer = new StringBuilder(255);

            // Call the GetPrivateProfileString function to retrieve the value from the INI file.
            GetPrivateProfileString(Section, Key, Default.ToString(), Buffer, 255, Path);

            // Return the retrieved value as a int.
            return int.Parse(Buffer.ToString());
        }
    }
}