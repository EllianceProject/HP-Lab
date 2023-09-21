namespace HP_Lab
{
    public class Variable // This class represents a collection of various data variables related to a process or system.
    {
        // Network-related properties
        public static string PLCIPAddress { get; set; }

        public static int PLCPortName { get; set; }

        public static string TowerLightIPAddress { get; set; }

        public static int TowerLightPortName { get; set; }

        // Database-related properties
        public static string DatabaseServer { get; set; }

        public static int DatabasePort { get; set; }

        public static string DatabaseName { get; set; }

        public static string DatabaseUsername { get; set; }

        public static string DatabasePassword { get; set; }

        // Properties for various data measurements
        public string IncomingPressure { get; set; }

        public string TotalAirConsumption { get; set; }

        public string ServoMotor1Position { get; set; }

        public string ServoMotor2Position { get; set; }

        public string ServoMotor3Position { get; set; }

        public string ServoMotor4Position { get; set; }

        public string TMRobotPowerConsumption { get; set; }

        public string TMRobotVoltage { get; set; }

        public string TMRobotCurrent { get; set; }

        public string TMRobotTemperature { get; set; }

        public string WholeTrayCycleTime { get; set; }

        public string MachineUpTimeHours { get; set; }

        public string MachineUpTimeMinutes { get; set; }

        public string MachineDownTimeHours { get; set; }

        public string MachineDownTimeMinutes { get; set; }

        public string MachineIdleTimeHours { get; set; }

        public string MachineIdleTimeMinutes { get; set; }

        public string Yield { get; set; }

        public string Pass { get; set; }

        public string Fail { get; set; }

        public string PowerConsumption { get; set; }

        public string LineToLineVolt { get; set; }

        public string Line1ToNeutralVolt { get; set; }

        public string Line1Current { get; set; }

        public string Line2ToNeutralVolt { get; set; }

        public string Line2Current { get; set; }

        public string Line3ToNeutralVolt { get; set; }

        public string Line3Current { get; set; }

        public string MainMachineTowerlight { get; set; }

        public string BufferStationTowerlight { get; set; }

        public string BufferStationLoader { get; set; }

        public string BufferStationUnLoader { get; set; }

        public string AGVStationTowerlight { get; set; }

        public string AGVStationBattery { get; set; }

        public string AGVLocationX { get; set; }

        public string AGVLocationY { get; set; }

        public string AGVTrayStatus { get; set; }

        public string CurrentTrayNumber { get; set; }

        public string OEE { get; set; }

        public string InspectionStatus { get; set; }


        public string PicaCode { get; set; }

        public string PenID { get; set; }

        public string Location { get; set; }

        public string TrayComplete { get; set; }

        public string PrevTrayComplete { get; set; }

        public string ProjectComplete { get; set; }

        public string PrevProjectComplete { get; set; }

        public string ProjectTime { get; set; }

        public string PrevProjectTime { get; set; }

        public string ProjectName { get; set; }

        public string PrevProjectName { get; set; }

        public string BarcodeLabel { get; set; }

        public string RobotErrorCode { get; set; }

        public string PrevRobotErrorCode { get; set; }

        public bool RobotError { get; set; }

        public string TowerLightRed { get; set; }

        public string TowerLightAmber { get; set; }

        public string TowerLightGreen { get; set; }

        public int MachineStatus { get; set; }

        public int PrevMachineStatus { get; set; }

        public string Cam1 { get; set; }

        public string Cam2 { get; set; }

        public string Cam3 { get; set; }

        public string Cam4 { get; set; }

        public string Cam5 { get; set; }

        public int PenState { get; set; }

        public bool Cam1DataInserted { get; set; }

        public bool Cam2DataInserted { get; set; }

        public bool Cam3DataInserted { get; set; }

        public bool Cam4DataInserted { get; set; }

        public bool Cam5DataInserted { get; set; }

        public string PenStatus { get; set; }

        public string PrevPenStatus { get; set; }

        public bool InspectionData { get; set; }

        public string PenCycleTime { get; set; }

        public string ErrorName1 { get; set; }

        public string ErrorName2 { get; set; }

        public string ErrorName3 { get; set; }

        public string ErrorName4 { get; set; }

        public string ErrorName5 { get; set; }

        public string ErrorName6 { get; set; }

        public string ErrorName7 { get; set; }

        public string ErrorName8 { get; set; }

        public string ErrorName9 { get; set; }

        public string ErrorName10 { get; set; }

        public string ErrorName11 { get; set; }

        public string ErrorName12 { get; set; }

        public string ErrorName13 { get; set; }

        public string ErrorName14 { get; set; }

        public string ErrorName15 { get; set; }

        public string ErrorName16 { get; set; }

        public bool Error1 { get; set; }

        public bool Error2 { get; set; }

        public bool Error3 { get; set; }

        public bool Error4 { get; set; }

        public bool Error5 { get; set; }

        public bool Error6 { get; set; }

        public bool Error7 { get; set; }

        public bool Error8 { get; set; }

        public bool Error9 { get; set; }

        public bool Error10 { get; set; }

        public bool Error11 { get; set; }

        public bool Error12 { get; set; }

        public bool Error13 { get; set; }

        public bool Error14 { get; set; }

        public bool Error15 { get; set; }

        public bool Error16 { get; set; }

        // Flag to indicate if an execution has been completed
        public bool Executed { get; set; }
    }
}