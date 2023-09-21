using System;
using System.Collections.Generic;
using System.Linq;
using System.Data;

namespace HP_Lab
{
    public class Procedure // Class for utility and data manipulation methods.
    {
        // Initialize a static Database object.
        public static Database Database = new Database(); // Database utility for queries.

        // Initialize a static List of strings.
        public static List<string> Array = new List<string>(); // A list of strings.

        // Initialize a static List of boolean values.
        public static List<bool> BinaryList = new List<bool>(); // A list of boolean values.

        // Initialize a static Log object.
        public static Log Log = new Log(); // Log utility for recording messages.

        // Declare a string variable for HexValue.
        string HexValue;

        // Declare a float variable for FloatValue.
        float FloatValue;

        // Declare a string variable for MachineErrorDesc.
        string MachineErrorDesc;

        // Declare a string variable for RobotErrorDesc.
        string RobotErrorDesc;

        /// <summary>
        /// Converts two hexadecimal values to a single floating-point number.
        /// </summary>
        /// <param name="HexA">The first hexadecimal value.</param>
        /// <param name="HexB">The second hexadecimal value.</param>
        /// <returns>A floating-point number derived from the provided hexadecimal values.</returns>
        public float HexToFloat(int HexA, int HexB)
        {
            try
            {
                // Combine two hex values and ensure it's no longer than 8 characters.
                string HexRep = (DecimalToHex(HexA) + DecimalToHex(HexB)).Substring(0, 8);

                // Convert the hexadecimal representation to a floating-point value.
                FloatValue = BitConverter.ToSingle(BitConverter.GetBytes(uint.Parse(HexRep, System.Globalization.NumberStyles.AllowHexSpecifier)), 0);
            }
            catch (Exception Exception)
            {
                // Log any exceptions that occur during the conversion.
                Log.AppendLog(Exception.Message);
            }

            // Return the floating-point value.
            return FloatValue;
        }

        /// <summary>
        /// Converts a decimal integer to a hexadecimal string representation.
        /// </summary>
        /// <param name="Decimal">The decimal integer to convert.</param>
        /// <returns>A hexadecimal string representation of the provided decimal value.</returns>
        public string DecimalToHex(int Decimal)
        {
            try
            {
                // Convert the decimal value to a 4-character hexadecimal representation.
                HexValue = Decimal.ToString("x4");

                // If the decimal value is negative, truncate the representation to the last 4 characters.
                if (Decimal < 0)
                {
                    HexValue = HexValue.Substring(HexValue.Length - 4);
                }
            }
            catch (Exception Exception)
            {
                // Log any exceptions that occur during the conversion.
                Log.AppendLog(Exception.Message);
            }

            // Return the hexadecimal string representation.
            return HexValue;
        }

        /// <summary>
        /// Converts a hexadecimal string to a list of boolean values representing its binary equivalent.
        /// </summary>
        /// <param name="Hex">The hexadecimal value to convert.</param>
        /// <returns>A list of boolean values representing the binary equivalent of the provided hexadecimal value.</returns>
        public List<bool> HexToBinary(string Hex)
        {
            try
            {
                // Convert the hexadecimal value to a binary string.
                string Binary = Convert.ToString(Convert.ToInt32(Hex, 16), 2).PadLeft(Hex.Length * 4, '0');

                // Create a list of boolean values from the binary string.
                BinaryList = Binary.Select(c => c == '1').ToList();

                // Reverse the list to maintain the correct bit order.
                BinaryList.Reverse();
            }
            catch (Exception Exception)
            {
                // Log any exceptions that occur during the conversion.
                Log.AppendLog(Exception.Message);
            }

            // Return the list of boolean values representing the binary equivalent.
            return BinaryList;
        }

        /// <summary>
        /// Retrieves and returns the error description of a machine alarm/error based on the provided error code.
        /// </summary>
        /// <param name="ErrorCode">The error code for which to retrieve the description.
        /// </param>
        /// <returns>
        /// The error description corresponding to the provided error code, or an empty string if not found.
        /// </returns>
        public string MachineAlarmDesc(string ErrorCode)
        {
            try
            {
                // Retrieve the error description from the database using the provided error code.
                DataTable DataTable = Database.GetRecords("SELECT * FROM \"Reference\".machine_alarm_list WHERE machine_alarm_list.error_code = '" + ErrorCode + "'");

                if (DataTable.Rows.Count > 0)
                {
                    // Build the error description by combining the error code and description
                    MachineErrorDesc = ErrorCode + " - " + DataTable.Rows[0]["error_desc"].ToString();
                }
            }
            catch (Exception Exception)
            {
                // Log any exceptions that occur during the operation.
                Log.AppendLog(Exception.Message);
            }

            // Return the error description, which may be an empty string if not found.
            return MachineErrorDesc;
        }

        /// <summary>
        /// Retrieves and returns the error description of a robot alarm/error based on the provided error code.
        /// </summary>
        /// <param name="ErrorCode">The error code for which to retrieve the description.</param>
        /// <returns>
        /// <returns>The error description corresponding to the provided error code, or an empty string if not found.</returns>
        /// </returns>
        public string RobotAlarmDesc(string ErrorCode)
        {
            try
            {
                // Retrieve the error description from the database using the provided error code.
                DataTable DataTable = Database.GetRecords("SELECT * FROM \"Reference\".robot_alarm_list WHERE robot_alarm_list.error_code = '" + ErrorCode + "'");

                if (DataTable.Rows.Count > 0)
                {
                    // Build the error description by combining the error code and description
                    RobotErrorDesc = ErrorCode + " - " + DataTable.Rows[0]["error_desc"].ToString();
                }
            }
            catch (Exception Exception)
            {
                // Log any exceptions that occur during the operation
                Log.AppendLog(Exception.Message);
            }

            // Return the error description, which may be an empty string if not found.
            return RobotErrorDesc;
        }
    }
}