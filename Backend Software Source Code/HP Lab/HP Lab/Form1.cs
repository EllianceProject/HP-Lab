using System;
using System.Collections.Generic;
using System.Data;
using System.Diagnostics;
using System.Drawing;
using System.Linq;
using System.Reflection;
using System.Text;
using System.Threading;
using System.Timers;
using System.Windows.Forms;
using EasyModbus;

namespace HP_Lab
{
    public partial class Form1 : Form
    {
        // Mutex to prevent multiple instances of the application.
        public static Mutex Mutex { get; set; }

        // Modbus client for communication with Modbus server.
        public static ModbusClient PLCReader { get; set; }

        // Modbus client for communication with TowerLight server.
        public static ModbusClient TowerLight { get; set; }

        // Log instance for managing log messages.
        public static Log Log { get; set; }

        // Procedure instance for handling procedures.
        public static Procedure Pro { get; set; }

        // Database instance for database operations.
        public static Database Database { get; set; }

        public System.Timers.Timer Reconnection { get; set; }

        // List of integer Machine register values.
        public static List<int> MachineRegisterList { get; set; }

        // List of Machine error code strings.
        public static List<string> MachineErrorCodeList { get; set; }

        // List of Robot error code strings.
        public static List<string> RobotErrorCodeList { get; set; }

        // Variable instance for managing general variables.
        public static Variable Variable { get; set; }

        // Define DateTime objects initialized to the current time.
        public DateTime LastTimeDay1 = DateTime.Now; // Represents the last time for a 1-day interval.
        public DateTime LastTimeDay5 = DateTime.Now; // Represents the last time for a 5-day interval.
        public DateTime LastTimeDay14 = DateTime.Now; // Represents the last time for a 14-day interval.

        // Variable instances for different pens.
        public static Variable Pen1 { get; set; }

        public static Variable Pen2 { get; set; }

        public static Variable Pen3 { get; set; }

        public static Variable Pen4 { get; set; }

        public static Variable Pen5 { get; set; }

        public static Variable Pen6 { get; set; }

        public static Variable Pen7 { get; set; }

        public static Variable Pen8 { get; set; }

        public static Variable Pen9 { get; set; }

        public static Variable Pen10 { get; set; }

        public static Variable Pen11 { get; set; }

        public static Variable Pen12 { get; set; }

        public static Variable Pen13 { get; set; }

        public static Variable Pen14 { get; set; }

        public static Variable Pen15 { get; set; }

        // Variable instances for different error actions.
        public static Variable ErrorAction1 { get; set; }

        public static Variable ErrorAction2 { get; set; }

        public static Variable ErrorAction3 { get; set; }

        public static Variable ErrorAction4 { get; set; }

        public static Variable ErrorAction5 { get; set; }

        public static Variable ErrorAction6 { get; set; }

        public static Variable ErrorAction7 { get; set; }

        public static Variable ErrorAction8 { get; set; }

        public static Variable ErrorAction9 { get; set; }

        // Variable instances for different error words.
        public static Variable ErrorWord1 { get; set; }

        public static Variable ErrorWord2 { get; set; }

        public static Variable ErrorWord3 { get; set; }

        public static Variable ErrorWord4 { get; set; }

        public static Variable ErrorWord5 { get; set; }

        public static Variable ErrorWord6 { get; set; }

        public static Variable ErrorWord7 { get; set; }

        public static Variable ErrorWord8 { get; set; }

        public static Variable ErrorWord9 { get; set; }

        public Form1()
        {
            // Initialize components of the form.
            InitializeComponent();

            // Perform setup to initialize objects and variables.
            Setup();

            // Read values from the INI configuration file.
            ReadIni();
        }

        /// <summary>
        /// Method that initializes and sets up various objects and variables.
        /// </summary>
        private void Setup()
        {
            // Object Creation

            // Create a list to store integer Machine register values.
            MachineRegisterList = new List<int>();

            // Create a list to store Machine error code strings.
            MachineErrorCodeList = new List<string>();

            // Create a list to store Robot error code strings.
            RobotErrorCodeList = new List<string>();

            // Create instances of various classes and variables for use.
            Database = new Database();
            Variable = new Variable();
            Log = new Log();
            Pro = new Procedure();

            Reconnection = new System.Timers.Timer(5 * 60 * 1000); // 5 minutes in milliseconds
            Reconnection.Elapsed += ReconnectionElapsed;

            // Create instances of Variable for different pens and their associated error actions and error words.
            Pen1 = new Variable();
            Pen2 = new Variable();
            Pen3 = new Variable();
            Pen4 = new Variable();
            Pen5 = new Variable();
            Pen6 = new Variable();
            Pen7 = new Variable();
            Pen8 = new Variable();
            Pen9 = new Variable();
            Pen10 = new Variable();
            Pen11 = new Variable();
            Pen12 = new Variable();
            Pen13 = new Variable();
            Pen14 = new Variable();
            Pen15 = new Variable();

            // Create instances of Variable for different error actions.
            ErrorAction1 = new Variable();
            ErrorAction2 = new Variable();
            ErrorAction3 = new Variable();
            ErrorAction4 = new Variable();
            ErrorAction5 = new Variable();
            ErrorAction6 = new Variable();
            ErrorAction7 = new Variable();
            ErrorAction8 = new Variable();
            ErrorAction9 = new Variable();

            // Create instances of Variable for different error words.
            ErrorWord1 = new Variable();
            ErrorWord2 = new Variable();
            ErrorWord3 = new Variable();
            ErrorWord4 = new Variable();
            ErrorWord5 = new Variable();
            ErrorWord6 = new Variable();
            ErrorWord7 = new Variable();
            ErrorWord8 = new Variable();
            ErrorWord9 = new Variable();
        }

        /// <summary>
        /// Event handler that handles actions when Form1 is loaded.
        /// </summary>
        /// <param name="sender">The object that triggered the event.</param>
        /// <param name="e">The EventArgs object containing event data.</param>
        private void Form1_Load(object sender, EventArgs e)
        {
            try
            {
                // Set the initial window state to minimized and make the NotifyIcon visible.
                WindowState = FormWindowState.Minimized;
                NotifyIcon.Visible = true;
                NotifyIcon.Icon = Icon;

                // Retrieve the version information from the executing assembly.
                Assembly Assembly = Assembly.GetExecutingAssembly();
                FileVersionInfo FileVersion = FileVersionInfo.GetVersionInfo(Assembly.Location);

                // Set the window title text to include the version information.
                Text = "Elliance @ HP Lab PLC Reader " + FileVersion.FileVersion;

                // Create a mutex to prevent multiple instances of the application.
                Mutex = new Mutex(true, "HP Lab", out bool NewInstance);

                // Check if a new instance was created or if the application is already open.
                if (!NewInstance)
                {
                    MessageBox.Show("Application is Currently Open", "Elliance @ HP Lab", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
                    Environment.Exit(0);
                }

                // Set the DatabaseConnection property in the INIFile class based on the INI configuration values.
                INIFile.DatabaseConnection = "Server = " + Variable.DatabaseServer + ";Port = " + Variable.DatabasePort + ";Database = " + Variable.DatabaseName + ";User Id = " + Variable.DatabaseUsername + ";Password = " + Variable.DatabasePassword + ";";

                try
                {
                    // Append log message about IP Address and Port.
                    AppendLog("PLC IP Address : " + Variable.PLCIPAddress + " | " + "PLC Port : " + Variable.PLCPortName.ToString());

                    // Create a new ModbusClient instance and connect to the Modbus server.
                    PLCReader = new ModbusClient(Variable.PLCIPAddress, Variable.PLCPortName);
                    PLCReader.Connect();
                    AppendLog("Connection Success to PLC.");
                    ModbusRead.Enabled = true;
                }
                catch (Exception Exception)
                {
                    // If an exception occurs during the process, log the exception message.
                    AppendLog("PLC Error : " + Exception.Message);
                }

                try
                {
                    // Append log message about IP Address and Port.
                    AppendLog("TowerLight IP Address : " + Variable.TowerLightIPAddress + " | " + "TowerLight Port : " + Variable.TowerLightPortName.ToString());

                    // Create a new ModbusClient instance and connect to the TowerLight server.
                    TowerLight = new ModbusClient(Variable.TowerLightIPAddress, Variable.TowerLightPortName);
                    TowerLight.Connect();
                    AppendLog("Connection Success to TowerLight.");
                }
                catch (Exception Exception)
                {
                    // If an exception occurs during the process, log the exception message.
                    AppendLog("TowerLight Error : " + Exception.Message);
                }

                // Fetch alarm definitions for both machine and robot.
                AlarmMachineDefinition();
                AlarmRobotDefinition();
            }
            catch (Exception Exception)
            {
                // If an exception occurs during the process, log the exception message.
                Log.AppendLog(Exception.Message);
            }
        }

        /// <summary>
        /// Event handler that opens the INI configuration file when the corresponding button is clicked.
        /// </summary>
        /// <param name="sender">The object that triggered the event.</param>
        /// <param name="e">The EventArgs object containing event data.</param>
        private void BtnOpenConfig_Click(object sender, EventArgs e)
        {
            try
            {
                // Use the Process.Start method to open the INI configuration file located in the application's startup path.
                Process.Start(Application.StartupPath + "\\Config.ini");
            }
            catch (Exception Exception)
            {
                // If an exception occurs during the process, log the exception message.
                Log.AppendLog(Exception.Message);
            }
        }

        /// <summary>
        /// Event handler that reads Modbus registers and displays the results when the corresponding button is clicked.
        /// </summary>
        /// <param name="sender">The object that triggered the event.</param>
        /// <param name="e">The EventArgs object containing event data.</param>
        private void BtnReadRegisters_Click(object sender, EventArgs e)
        {
            // Check if the Modbus client is not connected.
            if (!PLCReader.Connected)
            {
                try
                {
                    // Attempt to establish a connection to the Modbus server.
                    PLCReader.Connect();
                }
                catch
                {
                    // Handle the connection error if necessary.
                }
            }
            else
            {
                try
                {
                    // Read holding registers from the Modbus server based on specified starting address and quantity.
                    int[] serverResponse = PLCReader.ReadHoldingRegisters(int.Parse(TextBoxStartingAddress.Text), int.Parse(TextBoxQuantity.Text));

                    // Clear the existing items in the ListBoxRegister.
                    ListBoxRegister.Items.Clear();

                    // Iterate through the server response and add values to the ListBoxRegister.
                    for (int i = 0; i < serverResponse.Length; i++)
                    {
                        ListBoxRegister.Items.Add(serverResponse[i]);
                    }
                }
                catch (Exception Exception)
                {
                    // If an exception occurs during the process, log the exception message.
                    Log.AppendLog(Exception.Message);
                }
            }
        }

        /// <summary>
        /// Event handler for the Modbus read timer tick.
        /// </summary>
        /// <param name="sender">The sender object.</param>
        /// <param name="e">The event arguments.</param>
        private void ModbusRead_Tick(object sender, EventArgs e)
        {
            try
            {
                ConnectionTextBox.BackColor = Color.LawnGreen;

                // Clear the existing data in the Machine RegisterList.
                MachineRegisterList.Clear();

                // Iterate through Modbus holding registers in blocks of 100.
                for (int StartAddress = 1; StartAddress <= 401; StartAddress += 100)
                {
                    // Read 100 holding registers from the Modbus server.
                    int[] ServerResponse = PLCReader.ReadHoldingRegisters(StartAddress, 100);

                    // Iterate through the ServerResponse and add valid data to Machine RegisterList.
                    for (int i = 0; i < ServerResponse.Length; i++)
                    {
                        if (ServerResponse != null && ServerResponse.Length > 0)
                        {
                            MachineRegisterList.Add(ServerResponse[i]);
                        }
                    }
                }
            }
            catch
            {
                ConnectionTextBox.BackColor = Color.Red;
                Reconnection.Start();
            }

            try
            {
                ConnectionTextBox.BackColor = Color.LawnGreen;
                // Read 10 holding registers from the Modbus server.
                int[] ServerResponse = TowerLight.ReadHoldingRegisters(0, 10);

                Variable.TowerLightRed = int.Parse(Pro.DecimalToHex(ServerResponse[4])).ToString();
                Variable.TowerLightAmber = int.Parse(Pro.DecimalToHex(ServerResponse[5])).ToString();
                Variable.TowerLightGreen = int.Parse(Pro.DecimalToHex(ServerResponse[6])).ToString();
            }
            catch
            {
                ConnectionTextBox.BackColor = Color.Red;
                Reconnection.Start();
            }

            // Process the acquired Modbus data.
            ProcessData();
        }

        private void ReconnectionElapsed(object sender, ElapsedEventArgs e)
        {
            try
            {
                PLCReader.Connect();
                TowerLight.Connect();

                if (PLCReader.Connected && TowerLight.Connected)
                {
                    // Stop the timer since a successful connection is established
                    Reconnection.Stop();
                }
            }
            catch
            {
                // Handle the exception or log it as needed
            }
        }

        private void ProcessData()
        {
            string Date = DateTime.Now.ToString("yyyy-MM-dd");
            string Time = DateTime.Now.ToString("HH:mm:ss");
            string Datetime = DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss");

            try
            {
                //============================================== Truncate Table =============================================//
                TruncateTable();
                //===========================================================================================================//

                //============================================= Main Machine ================================================//
                Variable.IncomingPressure = Pro.HexToFloat(MachineRegisterList[31], MachineRegisterList[30]).ToString("0.00");
                UpdateTextBox(TextBoxIncomingPressure, Variable.IncomingPressure);

                Variable.TotalAirConsumption = MachineRegisterList[32].ToString();
                UpdateTextBox(TextBoxTotalAirConsumption, Variable.TotalAirConsumption);

                Variable.WholeTrayCycleTime = Pro.HexToFloat(MachineRegisterList[271], MachineRegisterList[270]).ToString("0.00");
                UpdateTextBox(TextBoxWholeTrayCycleTime, Variable.WholeTrayCycleTime);

                Variable.MachineUpTimeHours = MachineRegisterList[272].ToString();
                UpdateTextBox(TextBoxMachineUptimeHours, Variable.MachineUpTimeHours);

                Variable.MachineUpTimeMinutes = MachineRegisterList[273].ToString();
                UpdateTextBox(TextBoxMachineUptimeMinutes, Variable.MachineUpTimeMinutes);

                Variable.MachineDownTimeHours = MachineRegisterList[274].ToString();
                UpdateTextBox(TextBoxMachineDowntimeHours, Variable.MachineDownTimeHours);

                Variable.MachineDownTimeMinutes = MachineRegisterList[275].ToString();
                UpdateTextBox(TextBoxMachineDowntimeMinutes, Variable.MachineDownTimeMinutes);

                Variable.MachineIdleTimeHours = MachineRegisterList[276].ToString();
                UpdateTextBox(TextBoxMachineIdletimeHours, Variable.MachineIdleTimeHours);

                Variable.MachineIdleTimeMinutes = MachineRegisterList[277].ToString();
                UpdateTextBox(TextBoxMachineIdletimeMinutes, Variable.MachineIdleTimeMinutes);

                Variable.Yield = Pro.HexToFloat(MachineRegisterList[279], MachineRegisterList[278]).ToString("0.00");
                UpdateTextBox(TextBoxYield, Variable.Yield);

                Variable.Pass = MachineRegisterList[280].ToString();
                UpdateTextBox(TextBoxPass, Variable.Pass);

                Variable.Fail = MachineRegisterList[281].ToString();
                UpdateTextBox(TextBoxFail, Variable.Fail);

                Variable.PowerConsumption = Pro.HexToFloat(MachineRegisterList[283], MachineRegisterList[282]).ToString("0.00");
                UpdateTextBox(TextBoxPowerConsumption, Variable.PowerConsumption);

                Variable.LineToLineVolt = Pro.HexToFloat(MachineRegisterList[285], MachineRegisterList[284]).ToString("0.00");
                UpdateTextBox(TextBoxLineToLineVoltage, Variable.LineToLineVolt);

                Variable.Line1ToNeutralVolt = Pro.HexToFloat(MachineRegisterList[287], MachineRegisterList[286]).ToString("0.00");
                UpdateTextBox(TextBoxLine1ToNeutralVoltage, Variable.Line1ToNeutralVolt);

                Variable.Line1Current = Pro.HexToFloat(MachineRegisterList[289], MachineRegisterList[288]).ToString("0.00");
                UpdateTextBox(TextBoxLine1Current, Variable.Line1Current);

                Variable.Line2ToNeutralVolt = Pro.HexToFloat(MachineRegisterList[291], MachineRegisterList[290]).ToString("0.00");
                UpdateTextBox(TextBoxLine2ToNeutralVoltage, Variable.Line2ToNeutralVolt);

                Variable.Line2Current = Pro.HexToFloat(MachineRegisterList[293], MachineRegisterList[292]).ToString("0.00");
                UpdateTextBox(TextBoxLine2Current, Variable.Line2Current);

                Variable.Line3ToNeutralVolt = Pro.HexToFloat(MachineRegisterList[295], MachineRegisterList[294]).ToString("0.00");
                UpdateTextBox(TextBoxLine3ToNeutralVoltage, Variable.Line3ToNeutralVolt);

                Variable.Line3Current = Pro.HexToFloat(MachineRegisterList[297], MachineRegisterList[296]).ToString("0.00");
                UpdateTextBox(TextBoxLine3Current, Variable.Line3Current);

                Variable.MainMachineTowerlight = MachineRegisterList[298].ToString();

                Variable.OEE = Pro.HexToFloat(MachineRegisterList[312], MachineRegisterList[311]).ToString("0.00");
                UpdateTextBox(TextBoxOEE, Variable.OEE);

                Variable.InspectionStatus = MachineRegisterList[313].ToString();
                UpdateTextBox(TextBoxInspectionStatus, Variable.InspectionStatus);

                Database.ExecuteQuery("UPDATE \"Main\".hp_machine_parameter SET date = '" + Date + "', time = '" + Time + "', power_consumption = '" + Variable.PowerConsumption + "', " +
                                      "line_to_line_volt = '" + Variable.LineToLineVolt + "', line_1_to_neutralvolt = '" + Variable.Line1ToNeutralVolt + "', line_2_to_neutralvolt = '" + Variable.Line2ToNeutralVolt + "', " +
                                      "line_3_to_neutralvolt = '" + Variable.Line3ToNeutralVolt + "', line_1_current = '" + Variable.Line1Current + "', line_2_current = '" + Variable.Line2Current + "', line_3_current = '" + Variable.Line3Current + "', " +
                                      "incoming_pressure = '" + Variable.IncomingPressure + "', total_air_consumption = '" + Variable.TotalAirConsumption + "', tray_cycle = '" + Variable.WholeTrayCycleTime + "', uptime_hours = '" + Variable.MachineUpTimeHours + "', " +
                                      "uptime_minutes = '" + Variable.MachineUpTimeMinutes + "', downtime_hours = '" + Variable.MachineDownTimeHours + "', downtime_minutes = '" + Variable.MachineDownTimeMinutes + "', idletime_hours = '" + Variable.MachineIdleTimeHours + "', " +
                                      "idletime_minutes = '" + Variable.MachineIdleTimeMinutes + "', yield = '" + Variable.Yield + "', pass = '" + Variable.Pass + "', fail = '" + Variable.Fail + "', oee = '" + Variable.OEE + "', inspection_status = '" + Variable.InspectionStatus + "', " +
                                      "towerlight_status = '" + Variable.MainMachineTowerlight + "' WHERE id = 1");
                //===========================================================================================================//

                //============================================ Machine Status ===============================================//
                // Check if there is no alarm
                if (Variable.TowerLightRed == "0")
                {
                    // Check if either TowerLightAmber or TowerLightGreen is not "0".
                    if (Variable.TowerLightAmber != "0" || Variable.TowerLightGreen != "0")
                    {
                        // Set MachineStatus to 1 if TowerLightGreen is not "0", otherwise set it to 2.
                        Variable.MachineStatus = Variable.TowerLightGreen != "0" ? 1 : 2;
                        UpdateTextBox(TextBoxMainMachineTowerlight, (Variable.MachineStatus == 1) ? "Run" : (Variable.MachineStatus == 2) ? "Idle" : "");
                    }
                }
                else
                {
                    Variable.MachineStatus = 3;
                    UpdateTextBox(TextBoxMainMachineTowerlight, "Stop");
                }

                // Check if MachineStatus has changed from the previous state.
                if (Variable.MachineStatus != Variable.PrevMachineStatus)
                {
                    // Update the end_timestamp for the previous status in the database.
                    Database.ExecuteQuery("UPDATE \"Main\".hp_machine_status SET end_timestamp = '" + Datetime + "' WHERE status = '" + Variable.PrevMachineStatus + "' AND end_timestamp IS NULL");

                    // Insert a new record for the current MachineStatus in the database.
                    Database.ExecuteQuery("INSERT INTO \"Main\".hp_machine_status (status, start_timestamp, end_timestamp) VALUES ('" + Variable.MachineStatus + "','" + Datetime + "', NULL)");

                    // Update PrevMachineStatus to the current MachineStatus.
                    Variable.PrevMachineStatus = Variable.MachineStatus;
                }
                //===========================================================================================================//

                //=============================================== Servo Motor ===============================================//
                Variable.ServoMotor1Position = Pro.HexToFloat(MachineRegisterList[43], MachineRegisterList[42]).ToString("0.00");
                UpdateTextBox(TextBoxServoMotor1Position, Variable.ServoMotor1Position);

                Variable.ServoMotor2Position = Pro.HexToFloat(MachineRegisterList[49], MachineRegisterList[48]).ToString("0.00");
                UpdateTextBox(TextBoxServoMotor2Position, Variable.ServoMotor2Position);

                Variable.ServoMotor3Position = Pro.HexToFloat(MachineRegisterList[55], MachineRegisterList[54]).ToString("0.00");
                UpdateTextBox(TextBoxServoMotor3Position, Variable.ServoMotor3Position);

                Variable.ServoMotor4Position = Pro.HexToFloat(MachineRegisterList[61], MachineRegisterList[60]).ToString("0.00");
                UpdateTextBox(TextBoxServoMotor4Position, Variable.ServoMotor4Position);

                Database.ExecuteQuery("UPDATE \"Main\".hp_servo_motor SET date = '" + Date + "', time = '" + Time + "', servo_motor_1_position = '" +
                                      Variable.ServoMotor1Position + "', servo_motor_2_position = '" + Variable.ServoMotor2Position + "', servo_motor_3_position = '" +
                                      Variable.ServoMotor3Position + "', servo_motor_4_position = '" + Variable.ServoMotor4Position + "' WHERE id = 1");
                //===========================================================================================================//

                //================================================ TM Robot =================================================//
                Variable.TMRobotPowerConsumption = Pro.HexToFloat(MachineRegisterList[63], MachineRegisterList[62]).ToString("0.00");
                UpdateTextBox(TextBoxTMRobotPowerConsumption, Variable.TMRobotPowerConsumption);

                Variable.TMRobotVoltage = Pro.HexToFloat(MachineRegisterList[65], MachineRegisterList[64]).ToString("0.00");
                UpdateTextBox(TextBoxTMRobotVoltage, Variable.TMRobotVoltage);

                Variable.TMRobotCurrent = Pro.HexToFloat(MachineRegisterList[67], MachineRegisterList[66]).ToString("0.00");
                UpdateTextBox(TextBoxTMRobotCurrent, Variable.TMRobotCurrent);

                Variable.TMRobotTemperature = Pro.HexToFloat(MachineRegisterList[69], MachineRegisterList[68]).ToString("0.00");
                UpdateTextBox(TextBoxTMRobotTemperature, Variable.TMRobotTemperature);

                Database.ExecuteQuery("UPDATE \"Main\".hp_tm_robot SET date = '" + Date + "', time = '" + Time + "', power_consumption = '" +
                                      Variable.TMRobotPowerConsumption + "', voltage = '" + Variable.TMRobotVoltage + "', current = '" + Variable.TMRobotCurrent +
                                      "', temperature = '" + Variable.TMRobotTemperature + "' WHERE id = 1");
                //===========================================================================================================//

                //============================================== Buffer Station =============================================//
                Variable.BufferStationTowerlight = MachineRegisterList[299].ToString();
                UpdateTextBox(TextBoxBufferStationTowerLight, Variable.BufferStationTowerlight);

                Variable.BufferStationLoader = MachineRegisterList[300].ToString();
                UpdateTextBox(TextBoxBufferStationLoader, Variable.BufferStationLoader);

                Variable.BufferStationUnLoader = MachineRegisterList[301].ToString();
                UpdateTextBox(TextBoxBufferStationUnLoader, Variable.BufferStationUnLoader);

                Database.ExecuteQuery("UPDATE \"Main\".hp_buffer SET date = '" + Date + "', time = '" + Time + "', towerlight_status = '" +
                                      Variable.BufferStationTowerlight + "', loader_status = '" + Variable.BufferStationLoader + "', unloader_status = '" +
                                      Variable.BufferStationUnLoader + "' WHERE id = 1");
                //===========================================================================================================//

                //============================================== AGV Station ================================================//
                Variable.AGVStationTowerlight = MachineRegisterList[302].ToString();
                UpdateTextBox(TextBoxAGVStationTowerlight, Variable.AGVStationTowerlight);

                Variable.AGVStationBattery = Pro.HexToFloat(MachineRegisterList[304], MachineRegisterList[303]).ToString("0.00");
                UpdateTextBox(TextBoxAGVStationBattery, Variable.AGVStationBattery);

                Variable.AGVLocationX = MachineRegisterList[305].ToString("0.00");
                UpdateTextBox(TextBoxAGVLocationX, Variable.AGVLocationX);

                Variable.AGVLocationY = MachineRegisterList[307].ToString("0.00");
                UpdateTextBox(TextBoxAGVLocationY, Variable.AGVLocationY);

                Variable.AGVTrayStatus = MachineRegisterList[309].ToString();
                UpdateTextBox(TextBoxAGVTrayStatus, Variable.AGVTrayStatus);

                Database.ExecuteQuery("UPDATE \"Main\".hp_agv SET date = '" + Date + "', time = '" + Time + "', towerlight_status = '" +
                                      Variable.AGVStationTowerlight + "', battery_status = '" + Variable.AGVStationBattery + "', location_x = '" +
                                      Variable.AGVLocationX + "', location_y = '" + Variable.AGVLocationY + "', tray_status = '" + Variable.AGVTrayStatus + "' WHERE id = 1");
                //===========================================================================================================//

                //============================================ Project Completion ===========================================//
                Variable.TrayComplete = MachineRegisterList[314].ToString();
                UpdateTextBox(TextBoxTrayComplete, Variable.TrayComplete);

                Variable.ProjectComplete = MachineRegisterList[315].ToString();
                UpdateTextBox(TextBoxProjectComplete, Variable.ProjectComplete);

                Variable.ProjectTime = MachineRegisterList[359].ToString();
                UpdateTextBox(TextBoxProjectTime, Variable.ProjectTime);

                Variable.ProjectName = HexToChar(360, 409);
                UpdateTextBox(TextBoxProjectName, Variable.ProjectName);

                if (Variable.ProjectComplete == "0" && Variable.ProjectComplete != Variable.PrevProjectComplete)
                {
                    Database.ExecuteQuery("INSERT INTO \"Main\".hp_pen_outcome (date_time, project_name, pass, fail) VALUES ('" + Datetime + "','" + Variable.ProjectName + "','" + Variable.Pass + "','" + Variable.Fail + "')");
                }

                if (Variable.TrayComplete != Variable.PrevTrayComplete || Variable.ProjectComplete != Variable.PrevProjectComplete || Variable.ProjectTime != Variable.PrevProjectTime || Variable.ProjectName != Variable.PrevProjectName)
                {
                    if (Variable.ProjectName == "")
                    {
                        Database.ExecuteQuery("INSERT INTO \"Main\".hp_project (date_time, project_name, project_time, tray_complete, project_complete) " +
                                              "VALUES ('" + Datetime + "','" + Variable.PrevProjectName + "','" + Variable.ProjectTime + "','" + Variable.TrayComplete + "','" + Variable.ProjectComplete + "')");
                    }
                    else
                    {
                        Database.ExecuteQuery("INSERT INTO \"Main\".hp_project (date_time, project_name, project_time, tray_complete, project_complete) " +
                                              "VALUES ('" + Datetime + "','" + Variable.ProjectName + "','" + Variable.ProjectTime + "','" + Variable.TrayComplete + "','" + Variable.ProjectComplete + "')");
                    }

                    Variable.PrevTrayComplete = Variable.TrayComplete;
                    Variable.PrevProjectComplete = Variable.ProjectComplete;
                    Variable.PrevProjectTime = Variable.ProjectTime;
                    Variable.PrevProjectName = Variable.ProjectName;
                }
                //===========================================================================================================//

                //=============================================== Project List ==============================================//
                if (Variable.ProjectTime == "1" && !Variable.Executed)
                {
                    Database.ExecuteQuery("INSERT INTO \"Main\".hp_project_list (project_name, start_timestamp, end_timestamp) VALUES ('" + Variable.ProjectName + "','" + Datetime + "', NULL)");
                    Variable.Executed = true;
                }
                else if (Variable.ProjectTime == "2" && Variable.Executed)
                {
                    DataTable DataTable = Database.GetRecords("SELECT * FROM \"Main\".hp_project_list WHERE project_name = '" + Variable.ProjectName + "' AND end_timestamp IS NULL; ");

                    if (DataTable.Rows.Count > 0)
                    {
                        Database.ExecuteQuery("UPDATE \"Main\".hp_project_list SET end_timestamp = '" + Datetime + "' WHERE id = '" + DataTable.Rows[0]["id"].ToString() + "';");
                        Variable.Executed = false;
                    }
                }
                //===========================================================================================================//

                //=============================================== Robot Alarm ===============================================//
                Variable.RobotErrorCode = ((MachineRegisterList[347] << 16) | MachineRegisterList[348]).ToString("X8");
                Variable.RobotErrorCode = Variable.RobotErrorCode.Substring(4) + Variable.RobotErrorCode.Substring(0, 4);
                RobotAlarm(Variable.RobotErrorCode);
                //===========================================================================================================//

                //============================================== Machine Alarm ==============================================//
                object[] ErrorAction = new object[] { ErrorAction1, ErrorAction2, ErrorAction3, ErrorAction4, ErrorAction5, ErrorAction6, ErrorAction7, ErrorAction8, ErrorAction9 };
                object[] ErrorWord = new object[] { ErrorWord1, ErrorWord2, ErrorWord3, ErrorWord4, ErrorWord5, ErrorWord6, ErrorWord7, ErrorWord8, ErrorWord9 };

                for (int i = 349; i <= 357; i++)
                {
                    int Index = i - 349;

                    if (Index >= 0 && Index < ErrorAction.Length && Index < ErrorWord.Length)
                    {
                        MachineAlarm(Pro.HexToBinary(Pro.DecimalToHex(MachineRegisterList[i])).ToList(), ErrorAction[Index], ErrorWord[Index]);
                    }
                }
                //===========================================================================================================//

                //=============================================== PEN Data ==================================================//
                Variable.PicaCode = HexToChar(449, 468);
                UpdateTextBox(TextBoxPicaCode, Variable.PicaCode);

                Variable.PenID = HexToChar(99, 118);
                UpdateTextBox(TextBoxPenID, Variable.PenID);

                Variable.Location = MachineRegisterList[119].ToString();
                UpdateTextBox(TextBoxLocation, Variable.Location);

                Variable.CurrentTrayNumber = MachineRegisterList[310].ToString();
                UpdateTextBox(TextBoxCurrentTrayNumber, Variable.CurrentTrayNumber);

                Variable.BarcodeLabel = MachineRegisterList[419].ToString();
                UpdateTextBox(TextBoxBarcodeLabel, Variable.BarcodeLabel);
                //===========================================================================================================//

                //================================================= PEN 1 ===================================================//
                Pen1.Cam1 = MachineRegisterList[120].ToString();
                UpdateTextBox(TextBoxPen1Cam1, Pen1.Cam1);

                Pen1.Cam2 = MachineRegisterList[121].ToString();
                UpdateTextBox(TextBoxPen1Cam2, Pen1.Cam2);

                Pen1.Cam3 = MachineRegisterList[122].ToString();
                UpdateTextBox(TextBoxPen1Cam3, Pen1.Cam3);

                Pen1.Cam4 = MachineRegisterList[123].ToString();
                UpdateTextBox(TextBoxPen1Cam4, Pen1.Cam4);

                Pen1.Cam5 = MachineRegisterList[124].ToString();
                UpdateTextBox(TextBoxPen1Cam5, Pen1.Cam5);

                Pen1.PenCycleTime = Pro.HexToFloat(MachineRegisterList[128], MachineRegisterList[127]).ToString("0.00");
                UpdateTextBox(TextBoxPen1CycleTime, Pen1.PenCycleTime);

                Pen1.PenStatus = MachineRegisterList[129].ToString();
                UpdateTextBox(TextBoxPen1Status, Pen1.PenStatus);

                ProcessPenData("1", Pen1);
                //===========================================================================================================//

                //=================================================== PEN 2 =================================================//
                Pen2.Cam1 = MachineRegisterList[130].ToString();
                UpdateTextBox(TextBoxPen2Cam1, Pen2.Cam1);

                Pen2.Cam2 = MachineRegisterList[131].ToString();
                UpdateTextBox(TextBoxPen2Cam2, Pen2.Cam2);

                Pen2.Cam3 = MachineRegisterList[132].ToString();
                UpdateTextBox(TextBoxPen2Cam3, Pen2.Cam3);

                Pen2.Cam4 = MachineRegisterList[133].ToString();
                UpdateTextBox(TextBoxPen2Cam4, Pen2.Cam4);

                Pen2.Cam5 = MachineRegisterList[134].ToString();
                UpdateTextBox(TextBoxPen2Cam5, Pen2.Cam5);

                Pen2.PenCycleTime = Pro.HexToFloat(MachineRegisterList[138], MachineRegisterList[137]).ToString("0.00");
                UpdateTextBox(TextBoxPen2CycleTime, Pen2.PenCycleTime);

                Pen2.PenStatus = MachineRegisterList[139].ToString();
                UpdateTextBox(TextBoxPen2Status, Pen2.PenStatus);

                ProcessPenData("2", Pen2);
                //===========================================================================================================//

                //=================================================== PEN 3 =================================================//
                Pen3.Cam1 = MachineRegisterList[140].ToString();
                UpdateTextBox(TextBoxPen3Cam1, Pen3.Cam1);

                Pen3.Cam2 = MachineRegisterList[141].ToString();
                UpdateTextBox(TextBoxPen3Cam2, Pen3.Cam2);

                Pen3.Cam3 = MachineRegisterList[142].ToString();
                UpdateTextBox(TextBoxPen3Cam3, Pen3.Cam3);

                Pen3.Cam4 = MachineRegisterList[143].ToString();
                UpdateTextBox(TextBoxPen3Cam4, Pen3.Cam4);

                Pen3.Cam5 = MachineRegisterList[144].ToString();
                UpdateTextBox(TextBoxPen3Cam5, Pen3.Cam5);

                Pen3.PenCycleTime = Pro.HexToFloat(MachineRegisterList[148], MachineRegisterList[147]).ToString("0.00");
                UpdateTextBox(TextBoxPen3CycleTime, Pen3.PenCycleTime);

                Pen3.PenStatus = MachineRegisterList[149].ToString();
                UpdateTextBox(TextBoxPen3Status, Pen3.PenStatus);

                ProcessPenData("3", Pen3);
                //===========================================================================================================//

                //=================================================== PEN 4 =================================================//
                Pen4.Cam1 = MachineRegisterList[150].ToString();
                UpdateTextBox(TextBoxPen4Cam1, Pen4.Cam1);

                Pen4.Cam2 = MachineRegisterList[151].ToString();
                UpdateTextBox(TextBoxPen4Cam2, Pen4.Cam2);

                Pen4.Cam3 = MachineRegisterList[152].ToString();
                UpdateTextBox(TextBoxPen4Cam3, Pen4.Cam3);

                Pen4.Cam4 = MachineRegisterList[153].ToString();
                UpdateTextBox(TextBoxPen4Cam4, Pen4.Cam4);

                Pen4.Cam5 = MachineRegisterList[154].ToString();
                UpdateTextBox(TextBoxPen4Cam5, Pen4.Cam5);

                Pen4.PenCycleTime = Pro.HexToFloat(MachineRegisterList[158], MachineRegisterList[157]).ToString("0.00");
                UpdateTextBox(TextBoxPen4CycleTime, Pen4.PenCycleTime);

                Pen4.PenStatus = MachineRegisterList[159].ToString();
                UpdateTextBox(TextBoxPen4Status, Pen4.PenStatus);

                ProcessPenData("4", Pen4);
                //===========================================================================================================//

                //==================================================== PEN 5 ================================================//
                Pen5.Cam1 = MachineRegisterList[160].ToString();
                UpdateTextBox(TextBoxPen5Cam1, Pen5.Cam1);

                Pen5.Cam2 = MachineRegisterList[161].ToString();
                UpdateTextBox(TextBoxPen5Cam2, Pen5.Cam2);

                Pen5.Cam3 = MachineRegisterList[162].ToString();
                UpdateTextBox(TextBoxPen5Cam3, Pen5.Cam3);

                Pen5.Cam4 = MachineRegisterList[163].ToString();
                UpdateTextBox(TextBoxPen5Cam4, Pen5.Cam4);

                Pen5.Cam5 = MachineRegisterList[164].ToString();
                UpdateTextBox(TextBoxPen5Cam5, Pen5.Cam5);

                Pen5.PenCycleTime = Pro.HexToFloat(MachineRegisterList[168], MachineRegisterList[167]).ToString("0.00");
                UpdateTextBox(TextBoxPen5CycleTime, Pen5.PenCycleTime);

                Pen5.PenStatus = MachineRegisterList[169].ToString();
                UpdateTextBox(TextBoxPen5Status, Pen5.PenStatus);

                ProcessPenData("5", Pen5);
                //===========================================================================================================//

                //================================================ PEN 6 ====================================================//
                Pen6.Cam1 = MachineRegisterList[170].ToString();
                UpdateTextBox(TextBoxPen6Cam1, Pen6.Cam1);

                Pen6.Cam2 = MachineRegisterList[171].ToString();
                UpdateTextBox(TextBoxPen6Cam2, Pen6.Cam2);

                Pen6.Cam3 = MachineRegisterList[172].ToString();
                UpdateTextBox(TextBoxPen6Cam3, Pen6.Cam3);

                Pen6.Cam4 = MachineRegisterList[173].ToString();
                UpdateTextBox(TextBoxPen6Cam4, Pen6.Cam4);

                Pen6.Cam5 = MachineRegisterList[174].ToString();
                UpdateTextBox(TextBoxPen6Cam5, Pen6.Cam5);

                Pen6.PenCycleTime = Pro.HexToFloat(MachineRegisterList[178], MachineRegisterList[177]).ToString("0.00");
                UpdateTextBox(TextBoxPen6CycleTime, Pen6.PenCycleTime);

                Pen6.PenStatus = MachineRegisterList[179].ToString();
                UpdateTextBox(TextBoxPen6Status, Pen6.PenStatus);

                ProcessPenData("6", Pen6);
                //===========================================================================================================//

                //=================================================== PEN 7 =================================================//
                Pen7.Cam1 = MachineRegisterList[180].ToString();
                UpdateTextBox(TextBoxPen7Cam1, Pen7.Cam1);

                Pen7.Cam2 = MachineRegisterList[181].ToString();
                UpdateTextBox(TextBoxPen7Cam2, Pen7.Cam2);

                Pen7.Cam3 = MachineRegisterList[182].ToString();
                UpdateTextBox(TextBoxPen7Cam3, Pen7.Cam3);

                Pen7.Cam4 = MachineRegisterList[183].ToString();
                UpdateTextBox(TextBoxPen7Cam4, Pen7.Cam4);

                Pen7.Cam5 = MachineRegisterList[184].ToString();
                UpdateTextBox(TextBoxPen7Cam5, Pen7.Cam5);

                Pen7.PenCycleTime = Pro.HexToFloat(MachineRegisterList[188], MachineRegisterList[187]).ToString("0.00");
                UpdateTextBox(TextBoxPen7CycleTime, Pen7.PenCycleTime);

                Pen7.PenStatus = MachineRegisterList[189].ToString();
                UpdateTextBox(TextBoxPen7Status, Pen7.PenStatus);

                ProcessPenData("7", Pen7);
                //===========================================================================================================//

                //=================================================== PEN 8 =================================================//
                Pen8.Cam1 = MachineRegisterList[190].ToString();
                UpdateTextBox(TextBoxPen8Cam1, Pen8.Cam1);

                Pen8.Cam2 = MachineRegisterList[191].ToString();
                UpdateTextBox(TextBoxPen8Cam2, Pen8.Cam2);

                Pen8.Cam3 = MachineRegisterList[192].ToString();
                UpdateTextBox(TextBoxPen8Cam3, Pen8.Cam3);

                Pen8.Cam4 = MachineRegisterList[193].ToString();
                UpdateTextBox(TextBoxPen8Cam4, Pen8.Cam4);

                Pen8.Cam5 = MachineRegisterList[194].ToString();
                UpdateTextBox(TextBoxPen8Cam5, Pen8.Cam5);

                Pen8.PenCycleTime = Pro.HexToFloat(MachineRegisterList[198], MachineRegisterList[197]).ToString("0.00");
                UpdateTextBox(TextBoxPen8CycleTime, Pen8.PenCycleTime);

                Pen8.PenStatus = MachineRegisterList[199].ToString();
                UpdateTextBox(TextBoxPen8Status, Pen8.PenStatus);

                ProcessPenData("8", Pen8);
                //===========================================================================================================//

                //=================================================== PEN 9 =================================================//
                Pen9.Cam1 = MachineRegisterList[200].ToString();
                UpdateTextBox(TextBoxPen9Cam1, Pen9.Cam1);

                Pen9.Cam2 = MachineRegisterList[201].ToString();
                UpdateTextBox(TextBoxPen9Cam2, Pen9.Cam2);

                Pen9.Cam3 = MachineRegisterList[202].ToString();
                UpdateTextBox(TextBoxPen9Cam3, Pen9.Cam3);

                Pen9.Cam4 = MachineRegisterList[203].ToString();
                UpdateTextBox(TextBoxPen9Cam4, Pen9.Cam4);

                Pen9.Cam5 = MachineRegisterList[204].ToString();
                UpdateTextBox(TextBoxPen9Cam5, Pen9.Cam5);

                Pen9.PenCycleTime = Pro.HexToFloat(MachineRegisterList[208], MachineRegisterList[207]).ToString("0.00");
                UpdateTextBox(TextBoxPen9CycleTime, Pen9.PenCycleTime);

                Pen9.PenStatus = MachineRegisterList[209].ToString();
                UpdateTextBox(TextBoxPen9Status, Pen9.PenStatus);

                ProcessPenData("9", Pen9);
                //===========================================================================================================//

                //================================================ PEN 10 ===================================================//
                Pen10.Cam1 = MachineRegisterList[210].ToString();
                UpdateTextBox(TextBoxPen10Cam1, Pen10.Cam1);

                Pen10.Cam2 = MachineRegisterList[211].ToString();
                UpdateTextBox(TextBoxPen10Cam2, Pen10.Cam2);

                Pen10.Cam3 = MachineRegisterList[212].ToString();
                UpdateTextBox(TextBoxPen10Cam3, Pen10.Cam3);

                Pen10.Cam4 = MachineRegisterList[213].ToString();
                UpdateTextBox(TextBoxPen10Cam4, Pen10.Cam4);

                Pen10.Cam5 = MachineRegisterList[214].ToString();
                UpdateTextBox(TextBoxPen10Cam5, Pen10.Cam5);

                Pen10.PenCycleTime = Pro.HexToFloat(MachineRegisterList[218], MachineRegisterList[217]).ToString("0.00");
                UpdateTextBox(TextBoxPen10CycleTime, Pen10.PenCycleTime);

                Pen10.PenStatus = MachineRegisterList[219].ToString();
                UpdateTextBox(TextBoxPen10Status, Pen10.PenStatus);

                ProcessPenData("10", Pen10);
                //===========================================================================================================//

                //================================================== PEN 11 =================================================//
                Pen11.Cam1 = MachineRegisterList[220].ToString();
                UpdateTextBox(TextBoxPen11Cam1, Pen11.Cam1);

                Pen11.Cam2 = MachineRegisterList[221].ToString();
                UpdateTextBox(TextBoxPen11Cam2, Pen11.Cam2);

                Pen11.Cam3 = MachineRegisterList[222].ToString();
                UpdateTextBox(TextBoxPen11Cam3, Pen11.Cam3);

                Pen11.Cam4 = MachineRegisterList[223].ToString();
                UpdateTextBox(TextBoxPen11Cam4, Pen11.Cam4);

                Pen11.Cam5 = MachineRegisterList[224].ToString();
                UpdateTextBox(TextBoxPen11Cam5, Pen11.Cam5);

                Pen11.PenCycleTime = Pro.HexToFloat(MachineRegisterList[228], MachineRegisterList[227]).ToString("0.00");
                UpdateTextBox(TextBoxPen11CycleTime, Pen11.PenCycleTime);

                Pen11.PenStatus = MachineRegisterList[229].ToString();
                UpdateTextBox(TextBoxPen11Status, Pen11.PenStatus);

                ProcessPenData("11", Pen11);
                //===========================================================================================================//

                //=============================================== PEN 12 ====================================================//
                Pen12.Cam1 = MachineRegisterList[230].ToString();
                UpdateTextBox(TextBoxPen12Cam1, Pen12.Cam1);

                Pen12.Cam2 = MachineRegisterList[231].ToString();
                UpdateTextBox(TextBoxPen12Cam2, Pen12.Cam2);

                Pen12.Cam3 = MachineRegisterList[232].ToString();
                UpdateTextBox(TextBoxPen12Cam3, Pen12.Cam3);

                Pen12.Cam4 = MachineRegisterList[233].ToString();
                UpdateTextBox(TextBoxPen12Cam4, Pen12.Cam4);

                Pen12.Cam5 = MachineRegisterList[234].ToString();
                UpdateTextBox(TextBoxPen12Cam5, Pen12.Cam5);

                Pen12.PenCycleTime = Pro.HexToFloat(MachineRegisterList[238], MachineRegisterList[237]).ToString("0.00");
                UpdateTextBox(TextBoxPen12CycleTime, Pen12.PenCycleTime);

                Pen12.PenStatus = MachineRegisterList[239].ToString();
                UpdateTextBox(TextBoxPen12Status, Pen12.PenStatus);

                ProcessPenData("12", Pen12);
                //===========================================================================================================//

                //================================================= PEN 13 ==================================================//
                Pen13.Cam1 = MachineRegisterList[240].ToString();
                UpdateTextBox(TextBoxPen13Cam1, Pen13.Cam1);

                Pen13.Cam2 = MachineRegisterList[241].ToString();
                UpdateTextBox(TextBoxPen13Cam2, Pen13.Cam2);

                Pen13.Cam3 = MachineRegisterList[242].ToString();
                UpdateTextBox(TextBoxPen13Cam3, Pen13.Cam3);

                Pen13.Cam4 = MachineRegisterList[243].ToString();
                UpdateTextBox(TextBoxPen13Cam4, Pen13.Cam4);

                Pen13.Cam5 = MachineRegisterList[244].ToString();
                UpdateTextBox(TextBoxPen13Cam5, Pen13.Cam5);

                Pen13.PenCycleTime = Pro.HexToFloat(MachineRegisterList[248], MachineRegisterList[247]).ToString("0.00");
                UpdateTextBox(TextBoxPen13CycleTime, Pen13.PenCycleTime);

                Pen13.PenStatus = MachineRegisterList[249].ToString();
                UpdateTextBox(TextBoxPen13Status, Pen13.PenStatus);

                ProcessPenData("13", Pen13);
                //===========================================================================================================//

                //================================================== PEN 14 =================================================//
                Pen14.Cam1 = MachineRegisterList[250].ToString();
                UpdateTextBox(TextBoxPen14Cam1, Pen14.Cam1);

                Pen14.Cam2 = MachineRegisterList[251].ToString();
                UpdateTextBox(TextBoxPen14Cam2, Pen14.Cam2);

                Pen14.Cam3 = MachineRegisterList[252].ToString();
                UpdateTextBox(TextBoxPen14Cam3, Pen14.Cam3);

                Pen14.Cam4 = MachineRegisterList[253].ToString();
                UpdateTextBox(TextBoxPen14Cam4, Pen14.Cam4);

                Pen14.Cam5 = MachineRegisterList[254].ToString();
                UpdateTextBox(TextBoxPen14Cam5, Pen14.Cam5);

                Pen14.PenCycleTime = Pro.HexToFloat(MachineRegisterList[258], MachineRegisterList[257]).ToString("0.00");
                UpdateTextBox(TextBoxPen14CycleTime, Pen14.PenCycleTime);

                Pen14.PenStatus = MachineRegisterList[259].ToString();
                UpdateTextBox(TextBoxPen14Status, Pen14.PenStatus);

                ProcessPenData("14", Pen14);
                //===========================================================================================================//

                //=================================================== PEN 15 ================================================//
                Pen15.Cam1 = MachineRegisterList[260].ToString();
                UpdateTextBox(TextBoxPen15Cam1, Pen15.Cam1);

                Pen15.Cam2 = MachineRegisterList[261].ToString();
                UpdateTextBox(TextBoxPen15Cam2, Pen15.Cam2);

                Pen15.Cam3 = MachineRegisterList[262].ToString();
                UpdateTextBox(TextBoxPen15Cam3, Pen15.Cam3);

                Pen15.Cam4 = MachineRegisterList[263].ToString();
                UpdateTextBox(TextBoxPen15Cam4, Pen15.Cam4);

                Pen15.Cam5 = MachineRegisterList[264].ToString();
                UpdateTextBox(TextBoxPen15Cam5, Pen15.Cam5);

                Pen15.PenCycleTime = Pro.HexToFloat(MachineRegisterList[268], MachineRegisterList[267]).ToString("0.00");
                UpdateTextBox(TextBoxPen15CycleTime, Pen15.PenCycleTime);

                Pen15.PenStatus = MachineRegisterList[269].ToString();
                UpdateTextBox(TextBoxPen15Status, Pen15.PenStatus);

                ProcessPenData("15", Pen15);
                //===========================================================================================================//
            }
            catch (Exception Exception)
            {
                // If an exception occurs during the process, log the exception message.
                Log.AppendLog(MethodBase.GetCurrentMethod().Name + " : " + Exception.Message);
            }
        }

        /// <summary>
        /// Processes pen data, retrieves product information, and inserts inspection data and results into the database.
        /// </summary>
        /// <param name="Location">The location associated with the pen data.</param>
        /// <param name="PenData">The pen data object containing information about the pen's status and results.</param>
        public void ProcessPenData(string Location, Variable PenData)
        {
            try
            {
                // Retrieve data about the product associated with the pen's ID from the reference table.
                DataTable ProductDataTable = Database.GetRecords("SELECT * FROM \"Reference\".product_summary_list WHERE pen_id = '" + Variable.PenID.Substring(0, 4) + "';");

                // Check if the provided location matches the location in the PenData object.
                if (Variable.Location == Location)
                {
                    // Check if the pen's status has changed since the last processing.
                    if (PenData.PrevPenStatus != PenData.PenStatus)
                    {
                        if (PenData.PenStatus == "5")
                        {
                            // Execute the SQL query to insert data into the database when PenStatus is 5.
                            Database.ExecuteQuery("INSERT INTO \"Main\".hp_inspection_data (date_time, project_name, location, cycletime, pen_status, pen_id, pica_code, current_tray_number, barcode_label) " +
                                                  "VALUES ('" + DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss") + "','" + Variable.ProjectName + "','" + Variable.Location + "','" + PenData.PenCycleTime + "','" +
                                                  PenData.PenStatus + "', NULL , NULL ,'" + Variable.CurrentTrayNumber + "','" + Variable.BarcodeLabel + "')");
                        }
                        else
                        {
                            // Execute the SQL query to insert data into the database when PenStatus is not 5.
                            Database.ExecuteQuery("INSERT INTO \"Main\".hp_inspection_data (date_time, project_name, location, cycletime, pen_status, pen_id, pica_code, current_tray_number, barcode_label) " +
                                                  "VALUES ('" + DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss") + "','" + Variable.ProjectName + "','" + Variable.Location + "','" + PenData.PenCycleTime + "','" +
                                                  PenData.PenStatus + "','" + Variable.PenID + "','" + Variable.PicaCode + "','" + Variable.CurrentTrayNumber + "','" + Variable.BarcodeLabel + "')");
                        }

                        // Handle a specific condition related to Location 15 and PenStatus 2 or 3.
                        if (Variable.Location == "15" && !Variable.InspectionData && (PenData.PenStatus == "2" || PenData.PenStatus == "3"))
                        {
                            Thread.Sleep(4000);
                            // Insert placeholder data into the database.
                            Database.ExecuteQuery("INSERT INTO \"Main\".hp_inspection_data (date_time, project_name, location, cycletime, pen_status, pen_id, pica_code, current_tray_number, barcode_label) " +
                                                  "VALUES ('" + DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss") + "','" + 0 + "','" + 0 + "','" + 0 + "','" + 0 + "','" + 0 + "','" + 0 + "','" + 0 + "','" + 0 + "')");
                            Variable.InspectionData = true;
                        }
                        else if (Variable.Location != "15")
                        {
                            Variable.InspectionData = false;
                        }

                        // Update the previous pen status to match the current pen status for future comparisons.
                        PenData.PrevPenStatus = PenData.PenStatus;

                        // Reset flags for camera data insertion.
                        Variable.Cam1DataInserted = Variable.Cam2DataInserted = Variable.Cam3DataInserted = Variable.Cam4DataInserted = Variable.Cam5DataInserted = false;
                    }

                    if (PenData.PenStatus == "1")
                    {
                        // Check if the result is not "0" (indicating a valid result) and if the result has changed from the previous inspection for Camera 1.
                        if (PenData.Cam1 != "0" && !Variable.Cam1DataInserted)
                        {
                            // Retrieve inspection result data from the reference table based on Camera 1 and result code.
                            DataTable InspectionDataTable = Database.GetRecords("SELECT * FROM \"Reference\".inspection_result_list WHERE camera = '" + 1 + "' AND result_id = '" + PenData.Cam1 + "';");

                            // Check if both product data and inspection result data have been successfully retrieved.
                            if (ProductDataTable.Rows.Count > 0 && InspectionDataTable.Rows.Count > 0)
                            {
                                // Execute the constructed SQL query to insert the inspection result into the main database for Camera 1.
                                Database.ExecuteQuery("INSERT INTO \"Main\".hp_inspection_result (date_time, location, pen_id, pica_code, camera, result_id, failure_abbr, product, name, project_name, pen_result) " +
                                                      "VALUES ('" + DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss") + "','" + Variable.Location + "','" + Variable.PenID + "','" + Variable.PicaCode + "','" +
                                                      1 + "','" + PenData.Cam1 + "','" + InspectionDataTable.Rows[0]["failure_abbr"].ToString() + "','" + ProductDataTable.Rows[0]["product"].ToString() + "','" +
                                                      ProductDataTable.Rows[0]["name"].ToString() + "','" + Variable.ProjectName + "', NULL)");

                                Variable.Cam1DataInserted = true;
                            }
                        }

                        // Check if the result is not "0" (indicating a valid result) and if the result has changed from the previous inspection for Camera 2.
                        if (PenData.Cam2 != "0" && !Variable.Cam2DataInserted)
                        {
                            // Retrieve inspection result data from the reference table based on Camera 2 and result code.
                            DataTable InspectionDataTable = Database.GetRecords("SELECT * FROM \"Reference\".inspection_result_list WHERE camera = '" + 2 + "' AND result_id = '" + PenData.Cam2 + "';");

                            // Check if both product data and inspection result data have been successfully retrieved.
                            if (ProductDataTable.Rows.Count > 0 && InspectionDataTable.Rows.Count > 0)
                            {
                                // Execute the constructed SQL query to insert the inspection result into the main database for Camera 2.
                                Database.ExecuteQuery("INSERT INTO \"Main\".hp_inspection_result (date_time, location, pen_id, pica_code, camera, result_id, failure_abbr, product, name, project_name, pen_result) " +
                                                      "VALUES ('" + DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss") + "','" + Variable.Location + "','" + Variable.PenID + "','" + Variable.PicaCode + "','" +
                                                      2 + "','" + PenData.Cam2 + "','" + InspectionDataTable.Rows[0]["failure_abbr"].ToString() + "','" + ProductDataTable.Rows[0]["product"].ToString() + "','" +
                                                      ProductDataTable.Rows[0]["name"].ToString() + "','" + Variable.ProjectName + "', NULL)");

                                Variable.Cam2DataInserted = true;
                            }
                        }

                        // Check if the result is not "0" (indicating a valid result) and if the result has changed from the previous inspection for Camera 3.
                        if (PenData.Cam3 != "0" && !Variable.Cam3DataInserted)
                        {
                            // Retrieve inspection result data from the reference table based on Camera 3 and result code.
                            DataTable InspectionDataTable = Database.GetRecords("SELECT * FROM \"Reference\".inspection_result_list WHERE camera = '" + 3 + "' AND result_id = '" + PenData.Cam3 + "';");

                            // Check if both product data and inspection result data have been successfully retrieved.
                            if (ProductDataTable.Rows.Count > 0 && InspectionDataTable.Rows.Count > 0)
                            {
                                // Execute the constructed SQL query to insert the inspection result into the main database for Camera 3.
                                Database.ExecuteQuery("INSERT INTO \"Main\".hp_inspection_result (date_time, location, pen_id, pica_code, camera, result_id, failure_abbr, product, name, project_name, pen_result) " +
                                                      "VALUES ('" + DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss") + "','" + Variable.Location + "','" + Variable.PenID + "','" + Variable.PicaCode + "','" +
                                                      3 + "','" + PenData.Cam3 + "','" + InspectionDataTable.Rows[0]["failure_abbr"].ToString() + "','" + ProductDataTable.Rows[0]["product"].ToString() + "','" +
                                                      ProductDataTable.Rows[0]["name"].ToString() + "','" + Variable.ProjectName + "', NULL)");

                                Variable.Cam3DataInserted = true;
                            }
                        }

                        // Check if the result is not "0" (indicating a valid result) and if the result has changed from the previous inspection for Camera 4.
                        if (PenData.Cam4 != "0" && !Variable.Cam4DataInserted)
                        {
                            // Retrieve inspection result data from the reference table based on Camera 4 and result code.
                            DataTable InspectionDataTable = Database.GetRecords("SELECT * FROM \"Reference\".inspection_result_list WHERE camera = '" + 4 + "' AND result_id = '" + PenData.Cam4 + "';");

                            // Check if both product data and inspection result data have been successfully retrieved.
                            if (ProductDataTable.Rows.Count > 0 && InspectionDataTable.Rows.Count > 0)
                            {
                                // Execute the constructed SQL query to insert the inspection result into the main database for Camera 4.
                                Database.ExecuteQuery("INSERT INTO \"Main\".hp_inspection_result (date_time, location, pen_id, pica_code, camera, result_id, failure_abbr, product, name, project_name, pen_result) " +
                                                      "VALUES ('" + DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss") + "','" + Variable.Location + "','" + Variable.PenID + "','" + Variable.PicaCode + "','" +
                                                      4 + "','" + PenData.Cam4 + "','" + InspectionDataTable.Rows[0]["failure_abbr"].ToString() + "','" + ProductDataTable.Rows[0]["product"].ToString() + "','" +
                                                      ProductDataTable.Rows[0]["name"].ToString() + "','" + Variable.ProjectName + "', NULL)");

                                Variable.Cam4DataInserted = true;
                            }
                        }

                        // If all cameras have a result of "1", "10", or "88", the pen state is considered good (1); otherwise, it's considered bad (0).
                        Variable.PenState = ((PenData.Cam1 == "1" || PenData.Cam1 == "10" || PenData.Cam1 == "88") &&
                                              (PenData.Cam2 == "1" || PenData.Cam2 == "10" || PenData.Cam2 == "88") &&
                                              (PenData.Cam3 == "1" || PenData.Cam3 == "10" || PenData.Cam3 == "88") &&
                                              (PenData.Cam4 == "1" || PenData.Cam4 == "10" || PenData.Cam4 == "88") &&
                                              (PenData.Cam5 == "1" || PenData.Cam5 == "10" || PenData.Cam5 == "88")) ? 1 : 0;

                        // Check if the result is not "0" (indicating a valid result) and if the result has changed from the previous inspection for Camera 5.
                        if (PenData.Cam5 != "0" && !Variable.Cam5DataInserted)
                        {
                            // Retrieve inspection result data from the reference table based on Camera 5 and result code.
                            DataTable InspectionDataTable = Database.GetRecords("SELECT * FROM \"Reference\".inspection_result_list WHERE camera = '" + 5 + "' AND result_id = '" + PenData.Cam5 + "';");

                            // Check if both product data and inspection result data have been successfully retrieved.
                            if (ProductDataTable.Rows.Count > 0 && InspectionDataTable.Rows.Count > 0)
                            {
                                // Execute the constructed SQL query to insert the inspection result into the main database for Camera 5.
                                Database.ExecuteQuery("INSERT INTO \"Main\".hp_inspection_result (date_time, location, pen_id, pica_code, camera, result_id, failure_abbr, product, name, project_name, pen_result) " +
                                                      "VALUES ('" + DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss") + "','" + Variable.Location + "','" + Variable.PenID + "','" + Variable.PicaCode + "','" +
                                                      5 + "','" + PenData.Cam5 + "','" + InspectionDataTable.Rows[0]["failure_abbr"].ToString() + "','" + ProductDataTable.Rows[0]["product"].ToString() + "','" +
                                                      ProductDataTable.Rows[0]["name"].ToString() + "','" + Variable.ProjectName + "', '" + Variable.PenState + "')");

                                Variable.Cam5DataInserted = true;
                            }
                        }
                    }

                    if (Variable.Location == "15" && (PenData.PenStatus == "2" || PenData.PenStatus == "3"))
                    {
                        // Reset camera data when the location is 15 and PenStatus is 2 or 3.
                        Variable.Cam1 = Variable.Cam2 = Variable.Cam3 = Variable.Cam4 = Variable.Cam5 = null;
                    }
                }
            }
            catch (Exception Exception)
            {
                // If an exception occurs during the process, log the exception message.
                Log.AppendLog(MethodBase.GetCurrentMethod().Name + " : " + Exception.Message);
            }
        }

        /// <summary>
        /// Processes machine alarms based on specified bit locations and error data.
        /// </summary>
        /// <param name="BitLocation">A list of boolean values representing bit locations for alarms.</param>
        /// <param name="ErrorAction">An object containing error-related properties.</param>
        /// <param name="ErrorWord">An object containing error-related properties, such as error names.</param>
        private void MachineAlarm(List<bool> BitLocation, object ErrorAction, object ErrorWord)
        {
            try
            {
                // Iterate through each bit location (up to 16 bits).
                for (int i = 0; i < 16; i++)
                {
                    // Retrieve the current error status for the current bit location.
                    bool CurrentError = (bool)ErrorAction.GetType().GetProperty("Error" + (i + 1)).GetValue(ErrorAction);

                    // Check if the current bit location is true (indicating an active alarm) and there is no existing error.
                    if (BitLocation[i] && !CurrentError)
                    {
                        // Insert an alarm into the system and set the corresponding error property to true.
                        InsertMachineAlarm(ErrorWord.GetType().GetProperty("ErrorName" + (i + 1)).GetValue(ErrorWord).ToString());
                        ErrorAction.GetType().GetProperty("Error" + (i + 1)).SetValue(ErrorAction, true);
                    }
                    // Check if the current bit location is false (indicating no active alarm) and there is an existing error.
                    else if (!BitLocation[i] && CurrentError)
                    {
                        // Update the existing alarm and set the corresponding error property to false.
                        UpdateMachineAlarm(ErrorWord.GetType().GetProperty("ErrorName" + (i + 1)).GetValue(ErrorWord).ToString());
                        ErrorAction.GetType().GetProperty("Error" + (i + 1)).SetValue(ErrorAction, false);
                    }
                }
            }
            catch (Exception Exception)
            {
                // If an exception occurs during the process, log the exception message.
                Log.AppendLog(MethodBase.GetCurrentMethod().Name + " : " + Exception.Message);
            }
        }

        /// <summary>
        /// Manages robot alarms by inserting new alarms and updating cleared alarms in the database.
        /// </summary>
        /// <param name="RobotErrorCode">The robot error code to manage.</param>
        private void RobotAlarm(string RobotErrorCode)
        {
            try
            {
                if (Variable.RobotErrorCode != "00000000" && Variable.RobotErrorCode != Variable.PrevRobotErrorCode)
                {
                    // Insert a new robot alarm.
                    InsertRobotAlarm(Pro.RobotAlarmDesc(RobotErrorCode));

                    // Update the previous robot error code and set the RobotError flag.
                    Variable.PrevRobotErrorCode = Variable.RobotErrorCode;
                    Variable.RobotError = true;
                }
                else if (Variable.RobotErrorCode == "00000000" && Variable.RobotError)
                {
                    // Update a cleared robot alarm.
                    UpdateRobotAlarm(Pro.RobotAlarmDesc(Variable.PrevRobotErrorCode));

                    // Update the previous robot error code and reset the RobotError flag.
                    Variable.PrevRobotErrorCode = Variable.RobotErrorCode;
                    Variable.RobotError = false;
                }
            }
            catch (Exception Exception)
            {
                // If an exception occurs during the process, log the exception message.
                Log.AppendLog(MethodBase.GetCurrentMethod().Name + " : " + Exception.Message);
            }
        }

        /// <summary>
        /// Inserts an alarm entry into the database and triggers relevant actions for machine alarms.
        /// </summary>
        /// <param name="ErrorWord">The error description containing the error code and description.</param>
        private void InsertMachineAlarm(string ErrorWord)
        {
            try
            {
                // Retrieve alarm data from the reference table based on the error description.
                DataTable DataTable = Database.GetRecords("SELECT * FROM \"Reference\".machine_alarm_list WHERE error_desc = '" + ErrorWord.Split('-')[1].TrimStart() + "';");

                // Check if alarm data has been successfully retrieved.
                if (DataTable.Rows.Count > 0)
                {
                    // Execute the constructed SQL query to insert the alarm entry into the main database.
                    Database.ExecuteQuery("INSERT INTO \"Main\".hp_alarm_log (error_code, error_desc, start_timestamp, end_timestamp, action_state, source) " +
                                          "VALUES ('" + ErrorWord.Split('-')[0].TrimEnd() + "','" + ErrorWord.Split('-')[1].TrimStart() + "','" + DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss") + "', NULL, '" + 1 + "', '" + DataTable.Rows[0]["source"].ToString() + "')");

                    // Append a machine alarm message indicating the raised alarm.
                    AppendMachineAlarm(ErrorWord + " Raised !");
                }
            }
            catch (Exception Exception)
            {
                // If an exception occurs during the process, log the exception message.
                Log.AppendLog(MethodBase.GetCurrentMethod().Name + " : " + Exception.Message);
            }
        }

        /// <summary>
        /// Inserts an alarm entry into the database and triggers relevant actions for robot alarms.
        /// </summary>
        /// <param name="ErrorWord">The error description containing the error code and description.</param>
        private void InsertRobotAlarm(string ErrorWord)
        {
            try
            {
                // Retrieve alarm data from the reference table based on the error description.
                DataTable DataTable = Database.GetRecords("SELECT * FROM \"Reference\".robot_alarm_list WHERE error_desc = '" + ErrorWord.Split('-')[1].TrimStart() + "';");

                // Check if alarm data has been successfully retrieved.
                if (DataTable.Rows.Count > 0)
                {
                    // Execute the constructed SQL query to insert the alarm entry into the main database.
                    Database.ExecuteQuery("INSERT INTO \"Main\".hp_alarm_log (error_code, error_desc, start_timestamp, end_timestamp, action_state, source) " +
                                          "VALUES ('" + ErrorWord.Split('-')[0].TrimEnd() + "','" + ErrorWord.Split('-')[1].TrimStart() + "','" +
                                          DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss") + "', '" + DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss") + "', '" + 1 + "', '" + DataTable.Rows[0]["source"].ToString() + "')");

                    // Append a robot alarm message indicating the raised alarm.
                    AppendRobotAlarm(ErrorWord + " Raised !");
                }
            }
            catch (Exception Exception)
            {
                // If an exception occurs during the process, log the exception message.
                Log.AppendLog(MethodBase.GetCurrentMethod().Name + " : " + Exception.Message);
            }
        }

        /// <summary>
        /// Updates the status of a cleared machine alarm in the database and triggers relevant actions.
        /// </summary>
        /// <param name="ErrorWord">The error description containing the error code and description.</param>
        private void UpdateMachineAlarm(string ErrorWord)
        {
            try
            {
                // Retrieve alarm data from the main database based on the error code and active status.
                DataTable DataTable = Database.GetRecords("SELECT * FROM \"Main\".hp_alarm_log WHERE error_code = '" + ErrorWord.Split('-')[0].TrimEnd() + "' AND action_state = '1';");

                // Check if alarm data has been successfully retrieved.
                if (DataTable.Rows.Count > 0)
                {
                    // Update the alarm entry in the main database to mark it as cleared and set the end timestamp.
                    Database.ExecuteQuery("UPDATE \"Main\".hp_alarm_log SET action_state = 0, end_timestamp = '" + DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss") + "' WHERE id = '" + DataTable.Rows[0]["id"].ToString() + "';");

                    // Append a machine alarm message indicating the cleared alarm.
                    AppendMachineAlarm(ErrorWord + " Cleared !");
                }
            }
            catch (Exception Exception)
            {
                // If an exception occurs during the process, log the exception message.
                Log.AppendLog(MethodBase.GetCurrentMethod().Name + " : " + Exception.Message);
            }
        }

        /// <summary>
        /// Updates the status of a cleared alarm in the database and triggers relevant actions.
        /// </summary>
        /// <param name="ErrorWord">The error description containing the error code and description.</param>
        private void UpdateRobotAlarm(string ErrorWord)
        {
            try
            {
                // Retrieve alarm data from the main database based on the error code and active status.
                DataTable DataTable = Database.GetRecords("SELECT * FROM \"Main\".hp_alarm_log WHERE error_code = '" + ErrorWord.Split('-')[0].TrimEnd() + "' AND action_state = '1';");

                // Check if alarm data has been successfully retrieved.
                if (DataTable.Rows.Count > 0)
                {
                    // Update the alarm entry in the main database to mark it as cleared and set the end timestamp.
                    Database.ExecuteQuery("UPDATE \"Main\".hp_alarm_log SET action_state = 0, end_timestamp = '" + DateTime.Now.ToString("yyyy-MM-dd HH:mm:ss") + "' WHERE id = '" + DataTable.Rows[0]["id"].ToString() + "';");

                    // Append a robot alarm message indicating the cleared alarm.
                    AppendRobotAlarm(ErrorWord + " Cleared !");
                }
            }
            catch (Exception Exception)
            {
                // If an exception occurs during the process, log the exception message.
                Log.AppendLog(MethodBase.GetCurrentMethod().Name + " : " + Exception.Message);
            }
        }

        /// <summary>
        /// Updates the text value of a TextBox control in a thread-safe manner.
        /// </summary>
        /// <param name="Textbox">The TextBox control to be updated.</param>
        /// <param name="Value">The new text value to set for the TextBox.</param>
        private void UpdateTextBox(TextBox Textbox, string Value)
        {
            try
            {
                // Use the BeginInvoke method to update the TextBox's text value on the UI thread.
                Textbox.BeginInvoke(new Action(() => Textbox.Text = Value));
            }
            catch (Exception Exception)
            {
                // If an exception occurs during the process, log the exception message.
                Log.AppendLog(MethodBase.GetCurrentMethod().Name + " : " + Exception.Message);
            }
        }

        /// <summary>
        /// Truncates or deletes data from various database tables based on specific conditions.
        /// </summary>
        /// <summary>
        /// This method truncates or deletes data from various tables in the database based on specific time intervals and conditions.
        /// </summary>
        private void TruncateTable()
        {
            try
            {
                // Check if 1 day has passed.
                if (DateTime.Now.Subtract(LastTimeDay1).TotalDays >= 1 && DateTime.Now.Hour == 0)
                {
                    // Truncate the "Main.hp_inspection_data" table.
                    Database.ExecuteQuery("TRUNCATE TABLE \"Main\".hp_inspection_data");

                    // Truncate the "Main.hp_project" table.
                    Database.ExecuteQuery("TRUNCATE TABLE \"Main\".hp_project");

                    // Delete records older than 30 days from table.
                    Database.ExecuteQuery("DELETE FROM \"Backup\".hp_servo_motor WHERE date < '" + DateTime.Now.AddDays(-30).ToString("yyyy-MM-dd") + "'");
                    Database.ExecuteQuery("DELETE FROM \"Backup\".hp_tm_robot WHERE date < '" + DateTime.Now.AddDays(-30).ToString("yyyy-MM-dd") + "'");
                    Database.ExecuteQuery("DELETE FROM \"Backup\".hp_machine_parameter WHERE date < '" + DateTime.Now.AddDays(-30).ToString("yyyy-MM-dd") + "'");
                    Database.ExecuteQuery("DELETE FROM \"Main\".hp_error_log WHERE date_time < '" + DateTime.Now.AddDays(-30).ToString("yyyy-MM-dd") + "'");

                    // Update the LastTimeDay1 to the current time.
                    LastTimeDay1 = DateTime.Now;
                }

                // Check if 5 days have passed.
                if (DateTime.Now.Subtract(LastTimeDay5).TotalDays >= 5 && DateTime.Now.Hour == 0)
                {
                    // Truncate the "Main.hp_inspection_result" table.
                    Database.ExecuteQuery("TRUNCATE TABLE \"Main\".hp_inspection_result");
                    Log.AppendLog("Data Truncated From Main.hp_inspection_result");

                    // Update the LastTimeDay5 to the current time.
                    LastTimeDay5 = DateTime.Now;
                }

                // Check if 14 days have passed.
                if (DateTime.Now.Subtract(LastTimeDay14).TotalDays >= 14 && DateTime.Now.Hour == 0)
                {
                    // Truncate the "Main.hp_alarm_log" table.
                    Database.ExecuteQuery("TRUNCATE TABLE \"Main\".hp_alarm_log");
                    Log.AppendLog("Data Truncated From Main.hp_alarm_log");

                    // Update the LastTimeDay14 to the current time.
                    LastTimeDay14 = DateTime.Now;
                }
            }
            catch (Exception Exception)
            {
                // Log any exceptions that occur during the data truncation process.
                Log.AppendLog(Exception.Message);
            }
        }

        /// <summary>
        /// Converts a range of hexadecimal values in the MachineRegisterList to a string of characters.
        /// </summary>
        /// <param name="StartValue">The starting index of the range.</param>
        /// <param name="EndValue">The ending index of the range.</param>
        /// <returns>The concatenated character representations of the hexadecimal values.</returns>
        private string HexToChar(int StartValue, int EndValue)
        {
            // Create a StringBuilder to hold the concatenated character representations.
            StringBuilder StringBuilder = new StringBuilder();

            try
            {
                // Iterate through the range of values from StartValue to EndValue.
                for (int i = StartValue; i <= EndValue; i++)
                {
                    if (MachineRegisterList[i] != ' ' && MachineRegisterList[i] != '\t' && MachineRegisterList[i] != '\n' && MachineRegisterList[i] != '\r' && MachineRegisterList[i] != 0)
                    {
                        // Convert the hexadecimal value to a character and append it to the StringBuilder.
                        StringBuilder.Append((char)int.Parse(MachineRegisterList[i].ToString("X2"), System.Globalization.NumberStyles.HexNumber));
                    }
                }
            }
            catch (Exception Exception)
            {
                // If an exception occurs during the process, log the exception message.
                Log.AppendLog(MethodBase.GetCurrentMethod().Name + " : " + Exception.Message);
            }

            // Return the concatenated character representations as a string.
            return StringBuilder.ToString();
        }

        /// <summary>
        /// Appends a log message to a ListBox control in a thread-safe manner.
        /// </summary>
        /// <param name="Text">The log message to be appended.</param>
        private void AppendLog(string Text)
        {
            try
            {
                ListBoxLog.Invoke((MethodInvoker)delegate { ListBoxLog.Items.Add(DateTime.Now.ToString("hh:mm:ss tt") + " - " + Text); });
            }
            catch (Exception Exception)
            {
                // If an exception occurs during the process, log the exception message.
                Log.AppendLog(MethodBase.GetCurrentMethod().Name + " : " + Exception.Message);
            }
        }

        /// <summary>
        /// Appends a machine alarm message to a ListBox control in a thread-safe manner.
        /// </summary>
        /// <param name="Text">The machine alarm message to be appended.</param>
        private void AppendMachineAlarm(string Text)
        {
            try
            {
                // Use the Invoke method to add the machine alarm message to the ListBox on the UI thread.
                ListBoxMachineAlarm.Invoke((MethodInvoker)delegate { ListBoxMachineAlarm.Items.Add(DateTime.Now.ToString("hh:mm:ss tt") + " : " + Text); });
            }
            catch (Exception Exception)
            {
                // If an exception occurs during the process, log the exception message.
                Log.AppendLog(MethodBase.GetCurrentMethod().Name + " : " + Exception.Message);
            }
        }

        /// <summary>
        /// Appends a robot alarm message to a ListBox control in a thread-safe manner.
        /// </summary>
        /// <param name="Text">The robot alarm message to be appended.</param>
        private void AppendRobotAlarm(string Text)
        {
            try
            {
                // Use the Invoke method to add the robot alarm message to the ListBox on the UI thread.
                ListBoxRobotAlarm.Invoke((MethodInvoker)delegate { ListBoxRobotAlarm.Items.Add(DateTime.Now.ToString("hh:mm:ss tt") + " - " + Text); });
            }
            catch (Exception Exception)
            {
                // If an exception occurs during the process, log the exception message.
                Log.AppendLog(MethodBase.GetCurrentMethod().Name + " : " + Exception.Message);
            }
        }

        /// <summary>
        /// Reads configuration values from an INI file and assigns them to corresponding variables.
        /// </summary>
        private void ReadIni()
        {
            try
            {
                // Create an INIFile object to handle reading from the configuration INI file.
                INIFile INI = new INIFile(Application.StartupPath + "\\Config.ini");

                // Read and assign values from the [PLC] section of the INI file.
                Variable.PLCIPAddress = INI.ReadValue("PLC", "IPAddress", Variable.PLCIPAddress);
                Variable.PLCPortName = INI.ReadValue("PLC", "PortName", Variable.PLCPortName);

                // Read and assign values from the [TowerLight] section of the INI file.
                Variable.TowerLightIPAddress = INI.ReadValue("TowerLight", "IPAddress", Variable.TowerLightIPAddress);
                Variable.TowerLightPortName = INI.ReadValue("TowerLight", "PortName", Variable.TowerLightPortName);

                // Read and assign values from the [Database] section of the INI file.
                Variable.DatabaseServer = INI.ReadValue("Database", "DatabaseServer", Variable.DatabaseServer);
                Variable.DatabasePort = INI.ReadValue("Database", "DatabasePort", Variable.DatabasePort);
                Variable.DatabaseName = INI.ReadValue("Database", "DatabaseName", Variable.DatabaseName);
                Variable.DatabaseUsername = INI.ReadValue("Database", "DatabaseUsername", Variable.DatabaseUsername);
                Variable.DatabasePassword = INI.ReadValue("Database", "DatabasePassword", Variable.DatabasePassword);
            }
            catch (Exception Exception)
            {
                // If an exception occurs during the process, log the exception message.
                Log.AppendLog(MethodBase.GetCurrentMethod().Name + " : " + Exception.Message);
            }
        }

        /// <summary>
        /// Retrieves Machine alarm definitions from the database and assigns them to respective variables for machine alarms.
        /// </summary>
        private void AlarmMachineDefinition()
        {
            try
            {
                // Retrieve alarm definitions from the database sorted by ID.
                DataTable DataTable = Database.GetRecords("SELECT error_code, source FROM \"Reference\".machine_alarm_list ORDER BY id ASC");

                // Create a list to store the retrieved Machine error codes.
                foreach (DataRow DataRow in DataTable.Rows)
                {
                    // Add the 'error_code' value from the current DataRow to the MachineErrorCodeList.
                    MachineErrorCodeList.Add(DataRow["error_code"].ToString());
                }

                // Create a list of Variable objects representing error word variables.
                var ErrorWordList = new List<Variable> { ErrorWord1, ErrorWord2, ErrorWord3, ErrorWord4, ErrorWord5, ErrorWord6, ErrorWord7, ErrorWord8, ErrorWord9 };

                // Iterate through the error code list and assign alarm messages to respective error word variables.
                for (int i = 0; i < MachineErrorCodeList.Count && i < (ErrorWordList.Count * 16); i++)
                {
                    // Calculate the error word index and error name index based on the current iteration.
                    int ErrorWordIndex = i / 16;
                    int ErrorNameIndex = i % 16 + 1;

                    // Retrieve the alarm message using the Pro.GetAlarmMessage() method and assign it to the appropriate error word variable.
                    typeof(Variable).GetProperty("ErrorName" + ErrorNameIndex).SetValue(ErrorWordList[ErrorWordIndex], Pro.MachineAlarmDesc(MachineErrorCodeList[i]));
                }
            }
            catch (Exception Exception)
            {
                // If an exception occurs during the process, log the exception message.
                Log.AppendLog(MethodBase.GetCurrentMethod().Name + " : " + Exception.Message);
            }
        }

        /// <summary>
        /// Retrieves Robot alarm definitions from the database and populates a list with error codes.
        /// </summary>
        private void AlarmRobotDefinition()
        {
            try
            {
                // Retrieve alarm definitions from the database sorted by ID.
                DataTable DataTable = Database.GetRecords("SELECT error_code, source FROM \"Reference\".robot_alarm_list ORDER BY id ASC");

                // Create a list to store the retrieved Robot error codes.
                foreach (DataRow DataRow in DataTable.Rows)
                {
                    // Add the 'error_code' value from the current DataRow to the RobotErrorCodeList.
                    RobotErrorCodeList.Add(DataRow["error_code"].ToString());
                }
            }
            catch (Exception Exception)
            {
                // If an exception occurs during the process, log the exception message.
                Log.AppendLog(MethodBase.GetCurrentMethod().Name + " : " + Exception.Message);
            }
        }

        private void Form1_Resize(object sender, EventArgs e)
        {
            // Check if the window state has been minimized.
            if (WindowState == FormWindowState.Minimized)
            {
                // Hide the form from the taskbar.
                ShowInTaskbar = false;

                // Make the NotifyIcon visible in the system tray.
                NotifyIcon.Visible = true;
            }
        }

        private void NotifyIcon_MouseDoubleClick(object sender, MouseEventArgs e)
        {
            // Make the form visible in the taskbar.
            ShowInTaskbar = true;

            // Hide the NotifyIcon from the system tray.
            NotifyIcon.Visible = false;

            // Restore the window state to Normal, bringing the form back to its previous size and position.
            WindowState = FormWindowState.Normal;
        }

        private void Form1_FormClosing(object sender, FormClosingEventArgs e)
        {
            // Check if the form is being closed by the user.
            if (e.CloseReason == CloseReason.UserClosing)
            {
                // Cancel the default close action.
                e.Cancel = true;

                // Hide the form.
                Hide();

                // Make the NotifyIcon visible in the system tray.
                NotifyIcon.Visible = true;
            }
        }

        private void NotifyIcon_MouseClick(object sender, MouseEventArgs e)
        {
            // Check if the right mouse button was clicked.
            if (e.Button == MouseButtons.Right)
            {
                // Create a new ContextMenuStrip for the NotifyIcon.
                NotifyIcon.ContextMenuStrip = new ContextMenuStrip();

                // Add an "Exit" menu item to the ContextMenuStrip and attach the ExitMenuItem_Click event handler.
                NotifyIcon.ContextMenuStrip.Items.Add("Exit", null, ExitMenuItem_Click);

                // Show the ContextMenuStrip at the current cursor position.
                NotifyIcon.ContextMenuStrip.Show(Cursor.Position);
            }
        }

        private void ExitMenuItem_Click(object sender, EventArgs e)
        {
            // Dispose of the NotifyIcon to clean up resources.
            NotifyIcon.Dispose();

            // Terminate the application with a normal exit code (0).
            Environment.Exit(0);
        }
    }
}