
namespace HP_Lab
{
    partial class Form1
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.components = new System.ComponentModel.Container();
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Form1));
            this.ModbusRead = new System.Windows.Forms.Timer(this.components);
            this.Tab = new System.Windows.Forms.TabControl();
            this.Tab1 = new System.Windows.Forms.TabPage();
            this.groupBox9 = new System.Windows.Forms.GroupBox();
            this.BtnReadRegisters = new System.Windows.Forms.Button();
            this.BtnOpenConfig = new System.Windows.Forms.Button();
            this.ListBoxRegister = new System.Windows.Forms.ListBox();
            this.txtNumberOfValues = new System.Windows.Forms.Label();
            this.TextBoxQuantity = new System.Windows.Forms.TextBox();
            this.txtStartingAddress = new System.Windows.Forms.Label();
            this.TextBoxStartingAddress = new System.Windows.Forms.TextBox();
            this.groupBox5 = new System.Windows.Forms.GroupBox();
            this.ListBoxLog = new System.Windows.Forms.ListBox();
            this.Tab2 = new System.Windows.Forms.TabPage();
            this.groupBox10 = new System.Windows.Forms.GroupBox();
            this.label24 = new System.Windows.Forms.Label();
            this.TextBoxBarcodeLabel = new System.Windows.Forms.TextBox();
            this.label58 = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.TextBoxFail = new System.Windows.Forms.TextBox();
            this.TextBoxInspectionStatus = new System.Windows.Forms.TextBox();
            this.label51 = new System.Windows.Forms.Label();
            this.label7 = new System.Windows.Forms.Label();
            this.TextBoxPass = new System.Windows.Forms.TextBox();
            this.label66 = new System.Windows.Forms.Label();
            this.label52 = new System.Windows.Forms.Label();
            this.label9 = new System.Windows.Forms.Label();
            this.TextBoxYield = new System.Windows.Forms.TextBox();
            this.TextBoxOEE = new System.Windows.Forms.TextBox();
            this.label53 = new System.Windows.Forms.Label();
            this.label11 = new System.Windows.Forms.Label();
            this.TextBoxMachineIdletimeHours = new System.Windows.Forms.TextBox();
            this.label78 = new System.Windows.Forms.Label();
            this.label54 = new System.Windows.Forms.Label();
            this.TextBoxMachineDowntimeHours = new System.Windows.Forms.TextBox();
            this.label13 = new System.Windows.Forms.Label();
            this.label55 = new System.Windows.Forms.Label();
            this.TextBoxMachineIdletimeMinutes = new System.Windows.Forms.TextBox();
            this.TextBoxMachineUptimeHours = new System.Windows.Forms.TextBox();
            this.TextBoxLineToLineVoltage = new System.Windows.Forms.TextBox();
            this.label56 = new System.Windows.Forms.Label();
            this.label50 = new System.Windows.Forms.Label();
            this.TextBoxWholeTrayCycleTime = new System.Windows.Forms.TextBox();
            this.TextBoxLine1Current = new System.Windows.Forms.TextBox();
            this.label57 = new System.Windows.Forms.Label();
            this.TextBoxMachineDowntimeMinutes = new System.Windows.Forms.TextBox();
            this.TextBoxIncomingPressure = new System.Windows.Forms.TextBox();
            this.TextBoxLine2Current = new System.Windows.Forms.TextBox();
            this.TextBoxLine3ToNeutralVoltage = new System.Windows.Forms.TextBox();
            this.TextBoxLine3Current = new System.Windows.Forms.TextBox();
            this.TextBoxLine2ToNeutralVoltage = new System.Windows.Forms.TextBox();
            this.TextBoxMachineUptimeMinutes = new System.Windows.Forms.TextBox();
            this.TextBoxLine1ToNeutralVoltage = new System.Windows.Forms.TextBox();
            this.TextBoxTotalAirConsumption = new System.Windows.Forms.TextBox();
            this.TextBoxPowerConsumption = new System.Windows.Forms.TextBox();
            this.label59 = new System.Windows.Forms.Label();
            this.label12 = new System.Windows.Forms.Label();
            this.TextBoxMainMachineTowerlight = new System.Windows.Forms.TextBox();
            this.label10 = new System.Windows.Forms.Label();
            this.label25 = new System.Windows.Forms.Label();
            this.label8 = new System.Windows.Forms.Label();
            this.label5 = new System.Windows.Forms.Label();
            this.label6 = new System.Windows.Forms.Label();
            this.groupBox8 = new System.Windows.Forms.GroupBox();
            this.label64 = new System.Windows.Forms.Label();
            this.label63 = new System.Windows.Forms.Label();
            this.TextBoxProjectTime = new System.Windows.Forms.TextBox();
            this.TextBoxProjectName = new System.Windows.Forms.TextBox();
            this.label30 = new System.Windows.Forms.Label();
            this.TextBoxTrayComplete = new System.Windows.Forms.TextBox();
            this.label29 = new System.Windows.Forms.Label();
            this.TextBoxProjectComplete = new System.Windows.Forms.TextBox();
            this.Tab3 = new System.Windows.Forms.TabPage();
            this.groupBox4 = new System.Windows.Forms.GroupBox();
            this.label1 = new System.Windows.Forms.Label();
            this.TextBoxAGVTrayStatus = new System.Windows.Forms.TextBox();
            this.label4 = new System.Windows.Forms.Label();
            this.TextBoxAGVLocationY = new System.Windows.Forms.TextBox();
            this.label14 = new System.Windows.Forms.Label();
            this.TextBoxAGVLocationX = new System.Windows.Forms.TextBox();
            this.label15 = new System.Windows.Forms.Label();
            this.TextBoxAGVStationBattery = new System.Windows.Forms.TextBox();
            this.label18 = new System.Windows.Forms.Label();
            this.TextBoxAGVStationTowerlight = new System.Windows.Forms.TextBox();
            this.groupBox1 = new System.Windows.Forms.GroupBox();
            this.label22 = new System.Windows.Forms.Label();
            this.TextBoxBufferStationTowerLight = new System.Windows.Forms.TextBox();
            this.label21 = new System.Windows.Forms.Label();
            this.TextBoxBufferStationLoader = new System.Windows.Forms.TextBox();
            this.label19 = new System.Windows.Forms.Label();
            this.TextBoxBufferStationUnLoader = new System.Windows.Forms.TextBox();
            this.Tab4 = new System.Windows.Forms.TabPage();
            this.groupBox3 = new System.Windows.Forms.GroupBox();
            this.TextBoxTMRobotTemperature = new System.Windows.Forms.TextBox();
            this.label28 = new System.Windows.Forms.Label();
            this.TextBoxTMRobotCurrent = new System.Windows.Forms.TextBox();
            this.tm_robot_current = new System.Windows.Forms.Label();
            this.TextBoxTMRobotVoltage = new System.Windows.Forms.TextBox();
            this.TextBoxTMRobotPowerConsumption = new System.Windows.Forms.TextBox();
            this.tm_robot_voltage = new System.Windows.Forms.Label();
            this.label27 = new System.Windows.Forms.Label();
            this.groupBox2 = new System.Windows.Forms.GroupBox();
            this.label17 = new System.Windows.Forms.Label();
            this.label16 = new System.Windows.Forms.Label();
            this.label20 = new System.Windows.Forms.Label();
            this.TextBoxServoMotor4Position = new System.Windows.Forms.TextBox();
            this.label23 = new System.Windows.Forms.Label();
            this.TextBoxServoMotor3Position = new System.Windows.Forms.TextBox();
            this.TextBoxServoMotor1Position = new System.Windows.Forms.TextBox();
            this.TextBoxServoMotor2Position = new System.Windows.Forms.TextBox();
            this.Tab5 = new System.Windows.Forms.TabPage();
            this.TextBoxCurrentTrayNumber = new System.Windows.Forms.TextBox();
            this.label65 = new System.Windows.Forms.Label();
            this.TextBoxPicaCode = new System.Windows.Forms.TextBox();
            this.label62 = new System.Windows.Forms.Label();
            this.TextBoxPen15Status = new System.Windows.Forms.TextBox();
            this.TextBoxPen14Status = new System.Windows.Forms.TextBox();
            this.TextBoxPen13Status = new System.Windows.Forms.TextBox();
            this.TextBoxPen12Status = new System.Windows.Forms.TextBox();
            this.TextBoxPen11Status = new System.Windows.Forms.TextBox();
            this.TextBoxPen10Status = new System.Windows.Forms.TextBox();
            this.TextBoxPen9Status = new System.Windows.Forms.TextBox();
            this.TextBoxPen8Status = new System.Windows.Forms.TextBox();
            this.TextBoxPen7Status = new System.Windows.Forms.TextBox();
            this.TextBoxPen6Status = new System.Windows.Forms.TextBox();
            this.TextBoxPen5Status = new System.Windows.Forms.TextBox();
            this.TextBoxPen4Status = new System.Windows.Forms.TextBox();
            this.TextBoxPen3Status = new System.Windows.Forms.TextBox();
            this.TextBoxPen2Status = new System.Windows.Forms.TextBox();
            this.TextBoxPen1Status = new System.Windows.Forms.TextBox();
            this.label2 = new System.Windows.Forms.Label();
            this.label77 = new System.Windows.Forms.Label();
            this.label76 = new System.Windows.Forms.Label();
            this.label75 = new System.Windows.Forms.Label();
            this.label74 = new System.Windows.Forms.Label();
            this.label73 = new System.Windows.Forms.Label();
            this.label72 = new System.Windows.Forms.Label();
            this.label71 = new System.Windows.Forms.Label();
            this.label70 = new System.Windows.Forms.Label();
            this.label69 = new System.Windows.Forms.Label();
            this.label68 = new System.Windows.Forms.Label();
            this.label67 = new System.Windows.Forms.Label();
            this.label61 = new System.Windows.Forms.Label();
            this.label60 = new System.Windows.Forms.Label();
            this.label47 = new System.Windows.Forms.Label();
            this.label46 = new System.Windows.Forms.Label();
            this.TextBoxPen15CycleTime = new System.Windows.Forms.TextBox();
            this.TextBoxPen15Cam5 = new System.Windows.Forms.TextBox();
            this.TextBoxPen15Cam4 = new System.Windows.Forms.TextBox();
            this.TextBoxPen15Cam3 = new System.Windows.Forms.TextBox();
            this.TextBoxPen15Cam2 = new System.Windows.Forms.TextBox();
            this.TextBoxPen15Cam1 = new System.Windows.Forms.TextBox();
            this.TextBoxPen14CycleTime = new System.Windows.Forms.TextBox();
            this.TextBoxPen14Cam5 = new System.Windows.Forms.TextBox();
            this.TextBoxPen14Cam4 = new System.Windows.Forms.TextBox();
            this.TextBoxPen14Cam3 = new System.Windows.Forms.TextBox();
            this.TextBoxPen14Cam2 = new System.Windows.Forms.TextBox();
            this.TextBoxPen14Cam1 = new System.Windows.Forms.TextBox();
            this.TextBoxPen13CycleTime = new System.Windows.Forms.TextBox();
            this.TextBoxPen13Cam5 = new System.Windows.Forms.TextBox();
            this.TextBoxPen13Cam4 = new System.Windows.Forms.TextBox();
            this.TextBoxPen13Cam3 = new System.Windows.Forms.TextBox();
            this.TextBoxPen13Cam2 = new System.Windows.Forms.TextBox();
            this.TextBoxPen13Cam1 = new System.Windows.Forms.TextBox();
            this.TextBoxPen12CycleTime = new System.Windows.Forms.TextBox();
            this.TextBoxPen12Cam5 = new System.Windows.Forms.TextBox();
            this.TextBoxPen12Cam4 = new System.Windows.Forms.TextBox();
            this.TextBoxPen12Cam3 = new System.Windows.Forms.TextBox();
            this.TextBoxPen12Cam2 = new System.Windows.Forms.TextBox();
            this.TextBoxPen12Cam1 = new System.Windows.Forms.TextBox();
            this.TextBoxPen11CycleTime = new System.Windows.Forms.TextBox();
            this.TextBoxPen11Cam5 = new System.Windows.Forms.TextBox();
            this.TextBoxPen11Cam4 = new System.Windows.Forms.TextBox();
            this.TextBoxPen11Cam3 = new System.Windows.Forms.TextBox();
            this.TextBoxPen11Cam2 = new System.Windows.Forms.TextBox();
            this.TextBoxPen11Cam1 = new System.Windows.Forms.TextBox();
            this.TextBoxPen10CycleTime = new System.Windows.Forms.TextBox();
            this.TextBoxPen10Cam5 = new System.Windows.Forms.TextBox();
            this.TextBoxPen10Cam4 = new System.Windows.Forms.TextBox();
            this.TextBoxPen10Cam3 = new System.Windows.Forms.TextBox();
            this.TextBoxPen10Cam2 = new System.Windows.Forms.TextBox();
            this.TextBoxPen10Cam1 = new System.Windows.Forms.TextBox();
            this.TextBoxPen9CycleTime = new System.Windows.Forms.TextBox();
            this.TextBoxPen9Cam5 = new System.Windows.Forms.TextBox();
            this.TextBoxPen9Cam4 = new System.Windows.Forms.TextBox();
            this.TextBoxPen9Cam3 = new System.Windows.Forms.TextBox();
            this.TextBoxPen9Cam2 = new System.Windows.Forms.TextBox();
            this.TextBoxPen9Cam1 = new System.Windows.Forms.TextBox();
            this.TextBoxPen8CycleTime = new System.Windows.Forms.TextBox();
            this.TextBoxPen8Cam5 = new System.Windows.Forms.TextBox();
            this.TextBoxPen8Cam4 = new System.Windows.Forms.TextBox();
            this.TextBoxPen8Cam3 = new System.Windows.Forms.TextBox();
            this.TextBoxPen8Cam2 = new System.Windows.Forms.TextBox();
            this.TextBoxPen8Cam1 = new System.Windows.Forms.TextBox();
            this.TextBoxPen7CycleTime = new System.Windows.Forms.TextBox();
            this.TextBoxPen7Cam5 = new System.Windows.Forms.TextBox();
            this.TextBoxPen7Cam4 = new System.Windows.Forms.TextBox();
            this.TextBoxPen7Cam3 = new System.Windows.Forms.TextBox();
            this.TextBoxPen7Cam2 = new System.Windows.Forms.TextBox();
            this.TextBoxPen7Cam1 = new System.Windows.Forms.TextBox();
            this.TextBoxPen6CycleTime = new System.Windows.Forms.TextBox();
            this.TextBoxPen6Cam5 = new System.Windows.Forms.TextBox();
            this.TextBoxPen6Cam4 = new System.Windows.Forms.TextBox();
            this.TextBoxPen6Cam3 = new System.Windows.Forms.TextBox();
            this.TextBoxPen6Cam2 = new System.Windows.Forms.TextBox();
            this.TextBoxPen6Cam1 = new System.Windows.Forms.TextBox();
            this.TextBoxPen5CycleTime = new System.Windows.Forms.TextBox();
            this.TextBoxPen5Cam5 = new System.Windows.Forms.TextBox();
            this.TextBoxPen5Cam4 = new System.Windows.Forms.TextBox();
            this.TextBoxPen5Cam3 = new System.Windows.Forms.TextBox();
            this.TextBoxPen5Cam2 = new System.Windows.Forms.TextBox();
            this.TextBoxPen5Cam1 = new System.Windows.Forms.TextBox();
            this.TextBoxPen4CycleTime = new System.Windows.Forms.TextBox();
            this.TextBoxPen4Cam5 = new System.Windows.Forms.TextBox();
            this.TextBoxPen4Cam4 = new System.Windows.Forms.TextBox();
            this.TextBoxPen4Cam3 = new System.Windows.Forms.TextBox();
            this.TextBoxPen4Cam2 = new System.Windows.Forms.TextBox();
            this.TextBoxPen4Cam1 = new System.Windows.Forms.TextBox();
            this.TextBoxPen3CycleTime = new System.Windows.Forms.TextBox();
            this.TextBoxPen3Cam5 = new System.Windows.Forms.TextBox();
            this.TextBoxPen3Cam4 = new System.Windows.Forms.TextBox();
            this.TextBoxPen3Cam3 = new System.Windows.Forms.TextBox();
            this.TextBoxPen3Cam2 = new System.Windows.Forms.TextBox();
            this.TextBoxPen3Cam1 = new System.Windows.Forms.TextBox();
            this.TextBoxPen2CycleTime = new System.Windows.Forms.TextBox();
            this.TextBoxPen2Cam5 = new System.Windows.Forms.TextBox();
            this.TextBoxPen2Cam4 = new System.Windows.Forms.TextBox();
            this.TextBoxPen2Cam3 = new System.Windows.Forms.TextBox();
            this.TextBoxPen2Cam2 = new System.Windows.Forms.TextBox();
            this.TextBoxPen2Cam1 = new System.Windows.Forms.TextBox();
            this.TextBoxLocation = new System.Windows.Forms.TextBox();
            this.label40 = new System.Windows.Forms.Label();
            this.TextBoxPenID = new System.Windows.Forms.TextBox();
            this.label41 = new System.Windows.Forms.Label();
            this.TextBoxPen1CycleTime = new System.Windows.Forms.TextBox();
            this.label49 = new System.Windows.Forms.Label();
            this.TextBoxPen1Cam5 = new System.Windows.Forms.TextBox();
            this.label48 = new System.Windows.Forms.Label();
            this.TextBoxPen1Cam4 = new System.Windows.Forms.TextBox();
            this.label44 = new System.Windows.Forms.Label();
            this.TextBoxPen1Cam3 = new System.Windows.Forms.TextBox();
            this.label45 = new System.Windows.Forms.Label();
            this.TextBoxPen1Cam2 = new System.Windows.Forms.TextBox();
            this.label43 = new System.Windows.Forms.Label();
            this.TextBoxPen1Cam1 = new System.Windows.Forms.TextBox();
            this.label42 = new System.Windows.Forms.Label();
            this.Tab6 = new System.Windows.Forms.TabPage();
            this.groupBox7 = new System.Windows.Forms.GroupBox();
            this.ListBoxRobotAlarm = new System.Windows.Forms.ListBox();
            this.groupBox6 = new System.Windows.Forms.GroupBox();
            this.ListBoxMachineAlarm = new System.Windows.Forms.ListBox();
            this.NotifyIcon = new System.Windows.Forms.NotifyIcon(this.components);
            this.ContextMenuStrip = new System.Windows.Forms.ContextMenuStrip(this.components);
            this.CheckDaily = new System.Windows.Forms.Timer(this.components);
            this.ConnectionTextBox = new System.Windows.Forms.TextBox();
            this.Tab.SuspendLayout();
            this.Tab1.SuspendLayout();
            this.groupBox9.SuspendLayout();
            this.groupBox5.SuspendLayout();
            this.Tab2.SuspendLayout();
            this.groupBox10.SuspendLayout();
            this.groupBox8.SuspendLayout();
            this.Tab3.SuspendLayout();
            this.groupBox4.SuspendLayout();
            this.groupBox1.SuspendLayout();
            this.Tab4.SuspendLayout();
            this.groupBox3.SuspendLayout();
            this.groupBox2.SuspendLayout();
            this.Tab5.SuspendLayout();
            this.Tab6.SuspendLayout();
            this.groupBox7.SuspendLayout();
            this.groupBox6.SuspendLayout();
            this.SuspendLayout();
            // 
            // ModbusRead
            // 
            this.ModbusRead.Interval = 1000;
            this.ModbusRead.Tick += new System.EventHandler(this.ModbusRead_Tick);
            // 
            // Tab
            // 
            this.Tab.Controls.Add(this.Tab1);
            this.Tab.Controls.Add(this.Tab2);
            this.Tab.Controls.Add(this.Tab3);
            this.Tab.Controls.Add(this.Tab4);
            this.Tab.Controls.Add(this.Tab5);
            this.Tab.Controls.Add(this.Tab6);
            this.Tab.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Tab.Location = new System.Drawing.Point(12, 12);
            this.Tab.Name = "Tab";
            this.Tab.SelectedIndex = 0;
            this.Tab.Size = new System.Drawing.Size(895, 486);
            this.Tab.TabIndex = 57;
            // 
            // Tab1
            // 
            this.Tab1.Controls.Add(this.groupBox9);
            this.Tab1.Controls.Add(this.groupBox5);
            this.Tab1.Location = new System.Drawing.Point(4, 25);
            this.Tab1.Name = "Tab1";
            this.Tab1.Padding = new System.Windows.Forms.Padding(3);
            this.Tab1.Size = new System.Drawing.Size(887, 457);
            this.Tab1.TabIndex = 5;
            this.Tab1.Text = "Connection ";
            this.Tab1.UseVisualStyleBackColor = true;
            // 
            // groupBox9
            // 
            this.groupBox9.Controls.Add(this.ConnectionTextBox);
            this.groupBox9.Controls.Add(this.BtnReadRegisters);
            this.groupBox9.Controls.Add(this.BtnOpenConfig);
            this.groupBox9.Controls.Add(this.ListBoxRegister);
            this.groupBox9.Controls.Add(this.txtNumberOfValues);
            this.groupBox9.Controls.Add(this.TextBoxQuantity);
            this.groupBox9.Controls.Add(this.txtStartingAddress);
            this.groupBox9.Controls.Add(this.TextBoxStartingAddress);
            this.groupBox9.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.groupBox9.Location = new System.Drawing.Point(6, 6);
            this.groupBox9.Name = "groupBox9";
            this.groupBox9.Size = new System.Drawing.Size(875, 234);
            this.groupBox9.TabIndex = 48;
            this.groupBox9.TabStop = false;
            this.groupBox9.Text = "- Manual -";
            // 
            // BtnReadRegisters
            // 
            this.BtnReadRegisters.Location = new System.Drawing.Point(28, 173);
            this.BtnReadRegisters.Name = "BtnReadRegisters";
            this.BtnReadRegisters.Size = new System.Drawing.Size(245, 42);
            this.BtnReadRegisters.TabIndex = 40;
            this.BtnReadRegisters.Text = "Read Registers ";
            this.BtnReadRegisters.UseVisualStyleBackColor = true;
            this.BtnReadRegisters.Click += new System.EventHandler(this.BtnReadRegisters_Click);
            // 
            // BtnOpenConfig
            // 
            this.BtnOpenConfig.Location = new System.Drawing.Point(28, 35);
            this.BtnOpenConfig.Name = "BtnOpenConfig";
            this.BtnOpenConfig.Size = new System.Drawing.Size(245, 42);
            this.BtnOpenConfig.TabIndex = 41;
            this.BtnOpenConfig.Text = "Open Config File";
            this.BtnOpenConfig.Click += new System.EventHandler(this.BtnOpenConfig_Click);
            // 
            // ListBoxRegister
            // 
            this.ListBoxRegister.Enabled = false;
            this.ListBoxRegister.FormattingEnabled = true;
            this.ListBoxRegister.ItemHeight = 16;
            this.ListBoxRegister.Location = new System.Drawing.Point(309, 35);
            this.ListBoxRegister.Name = "ListBoxRegister";
            this.ListBoxRegister.Size = new System.Drawing.Size(549, 180);
            this.ListBoxRegister.TabIndex = 46;
            // 
            // txtNumberOfValues
            // 
            this.txtNumberOfValues.Location = new System.Drawing.Point(38, 136);
            this.txtNumberOfValues.Name = "txtNumberOfValues";
            this.txtNumberOfValues.Size = new System.Drawing.Size(145, 17);
            this.txtNumberOfValues.TabIndex = 45;
            this.txtNumberOfValues.Text = "Number of Values";
            // 
            // TextBoxQuantity
            // 
            this.TextBoxQuantity.Location = new System.Drawing.Point(219, 131);
            this.TextBoxQuantity.Name = "TextBoxQuantity";
            this.TextBoxQuantity.Size = new System.Drawing.Size(54, 22);
            this.TextBoxQuantity.TabIndex = 44;
            this.TextBoxQuantity.Text = "1";
            this.TextBoxQuantity.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // txtStartingAddress
            // 
            this.txtStartingAddress.Location = new System.Drawing.Point(34, 101);
            this.txtStartingAddress.Name = "txtStartingAddress";
            this.txtStartingAddress.Size = new System.Drawing.Size(131, 17);
            this.txtStartingAddress.TabIndex = 43;
            this.txtStartingAddress.Text = "Starting Address";
            this.txtStartingAddress.TextAlign = System.Drawing.ContentAlignment.TopCenter;
            // 
            // TextBoxStartingAddress
            // 
            this.TextBoxStartingAddress.Location = new System.Drawing.Point(219, 98);
            this.TextBoxStartingAddress.Name = "TextBoxStartingAddress";
            this.TextBoxStartingAddress.Size = new System.Drawing.Size(54, 22);
            this.TextBoxStartingAddress.TabIndex = 42;
            this.TextBoxStartingAddress.Text = "1";
            this.TextBoxStartingAddress.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // groupBox5
            // 
            this.groupBox5.Controls.Add(this.ListBoxLog);
            this.groupBox5.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.groupBox5.Location = new System.Drawing.Point(6, 246);
            this.groupBox5.Name = "groupBox5";
            this.groupBox5.Size = new System.Drawing.Size(875, 201);
            this.groupBox5.TabIndex = 33;
            this.groupBox5.TabStop = false;
            this.groupBox5.Text = "- Log -";
            // 
            // ListBoxLog
            // 
            this.ListBoxLog.FormattingEnabled = true;
            this.ListBoxLog.ItemHeight = 16;
            this.ListBoxLog.Location = new System.Drawing.Point(7, 19);
            this.ListBoxLog.Name = "ListBoxLog";
            this.ListBoxLog.Size = new System.Drawing.Size(862, 164);
            this.ListBoxLog.TabIndex = 34;
            // 
            // Tab2
            // 
            this.Tab2.Controls.Add(this.groupBox10);
            this.Tab2.Controls.Add(this.groupBox8);
            this.Tab2.Location = new System.Drawing.Point(4, 25);
            this.Tab2.Name = "Tab2";
            this.Tab2.Padding = new System.Windows.Forms.Padding(3);
            this.Tab2.Size = new System.Drawing.Size(887, 457);
            this.Tab2.TabIndex = 1;
            this.Tab2.Text = "Main ";
            this.Tab2.UseVisualStyleBackColor = true;
            // 
            // groupBox10
            // 
            this.groupBox10.Controls.Add(this.label24);
            this.groupBox10.Controls.Add(this.TextBoxBarcodeLabel);
            this.groupBox10.Controls.Add(this.label58);
            this.groupBox10.Controls.Add(this.label3);
            this.groupBox10.Controls.Add(this.TextBoxFail);
            this.groupBox10.Controls.Add(this.TextBoxInspectionStatus);
            this.groupBox10.Controls.Add(this.label51);
            this.groupBox10.Controls.Add(this.label7);
            this.groupBox10.Controls.Add(this.TextBoxPass);
            this.groupBox10.Controls.Add(this.label66);
            this.groupBox10.Controls.Add(this.label52);
            this.groupBox10.Controls.Add(this.label9);
            this.groupBox10.Controls.Add(this.TextBoxYield);
            this.groupBox10.Controls.Add(this.TextBoxOEE);
            this.groupBox10.Controls.Add(this.label53);
            this.groupBox10.Controls.Add(this.label11);
            this.groupBox10.Controls.Add(this.TextBoxMachineIdletimeHours);
            this.groupBox10.Controls.Add(this.label78);
            this.groupBox10.Controls.Add(this.label54);
            this.groupBox10.Controls.Add(this.TextBoxMachineDowntimeHours);
            this.groupBox10.Controls.Add(this.label13);
            this.groupBox10.Controls.Add(this.label55);
            this.groupBox10.Controls.Add(this.TextBoxMachineIdletimeMinutes);
            this.groupBox10.Controls.Add(this.TextBoxMachineUptimeHours);
            this.groupBox10.Controls.Add(this.TextBoxLineToLineVoltage);
            this.groupBox10.Controls.Add(this.label56);
            this.groupBox10.Controls.Add(this.label50);
            this.groupBox10.Controls.Add(this.TextBoxWholeTrayCycleTime);
            this.groupBox10.Controls.Add(this.TextBoxLine1Current);
            this.groupBox10.Controls.Add(this.label57);
            this.groupBox10.Controls.Add(this.TextBoxMachineDowntimeMinutes);
            this.groupBox10.Controls.Add(this.TextBoxIncomingPressure);
            this.groupBox10.Controls.Add(this.TextBoxLine2Current);
            this.groupBox10.Controls.Add(this.TextBoxLine3ToNeutralVoltage);
            this.groupBox10.Controls.Add(this.TextBoxLine3Current);
            this.groupBox10.Controls.Add(this.TextBoxLine2ToNeutralVoltage);
            this.groupBox10.Controls.Add(this.TextBoxMachineUptimeMinutes);
            this.groupBox10.Controls.Add(this.TextBoxLine1ToNeutralVoltage);
            this.groupBox10.Controls.Add(this.TextBoxTotalAirConsumption);
            this.groupBox10.Controls.Add(this.TextBoxPowerConsumption);
            this.groupBox10.Controls.Add(this.label59);
            this.groupBox10.Controls.Add(this.label12);
            this.groupBox10.Controls.Add(this.TextBoxMainMachineTowerlight);
            this.groupBox10.Controls.Add(this.label10);
            this.groupBox10.Controls.Add(this.label25);
            this.groupBox10.Controls.Add(this.label8);
            this.groupBox10.Controls.Add(this.label5);
            this.groupBox10.Controls.Add(this.label6);
            this.groupBox10.Location = new System.Drawing.Point(6, 6);
            this.groupBox10.Name = "groupBox10";
            this.groupBox10.Size = new System.Drawing.Size(875, 354);
            this.groupBox10.TabIndex = 160;
            this.groupBox10.TabStop = false;
            this.groupBox10.Text = "- Main Machine -";
            // 
            // label24
            // 
            this.label24.AutoSize = true;
            this.label24.Location = new System.Drawing.Point(441, 327);
            this.label24.Name = "label24";
            this.label24.Size = new System.Drawing.Size(110, 16);
            this.label24.TabIndex = 228;
            this.label24.Text = "Barcode Label";
            // 
            // TextBoxBarcodeLabel
            // 
            this.TextBoxBarcodeLabel.Enabled = false;
            this.TextBoxBarcodeLabel.Location = new System.Drawing.Point(696, 325);
            this.TextBoxBarcodeLabel.Name = "TextBoxBarcodeLabel";
            this.TextBoxBarcodeLabel.Size = new System.Drawing.Size(99, 22);
            this.TextBoxBarcodeLabel.TabIndex = 227;
            this.TextBoxBarcodeLabel.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label58
            // 
            this.label58.AutoSize = true;
            this.label58.Location = new System.Drawing.Point(441, 186);
            this.label58.Name = "label58";
            this.label58.Size = new System.Drawing.Size(214, 16);
            this.label58.TabIndex = 147;
            this.label58.Text = "Machine Down Time (Minutes)";
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(441, 22);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(151, 16);
            this.label3.TabIndex = 1;
            this.label3.Text = "Line To Line Voltage";
            // 
            // TextBoxFail
            // 
            this.TextBoxFail.Enabled = false;
            this.TextBoxFail.Location = new System.Drawing.Point(262, 324);
            this.TextBoxFail.Name = "TextBoxFail";
            this.TextBoxFail.Size = new System.Drawing.Size(100, 22);
            this.TextBoxFail.TabIndex = 144;
            this.TextBoxFail.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxInspectionStatus
            // 
            this.TextBoxInspectionStatus.Enabled = false;
            this.TextBoxInspectionStatus.Location = new System.Drawing.Point(696, 269);
            this.TextBoxInspectionStatus.Name = "TextBoxInspectionStatus";
            this.TextBoxInspectionStatus.Size = new System.Drawing.Size(100, 22);
            this.TextBoxInspectionStatus.TabIndex = 158;
            this.TextBoxInspectionStatus.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label51
            // 
            this.label51.AutoSize = true;
            this.label51.Location = new System.Drawing.Point(16, 327);
            this.label51.Name = "label51";
            this.label51.Size = new System.Drawing.Size(34, 16);
            this.label51.TabIndex = 143;
            this.label51.Text = "Fail";
            // 
            // label7
            // 
            this.label7.AutoSize = true;
            this.label7.Location = new System.Drawing.Point(441, 51);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(102, 16);
            this.label7.TabIndex = 4;
            this.label7.Text = "Line 1 Current";
            // 
            // TextBoxPass
            // 
            this.TextBoxPass.Enabled = false;
            this.TextBoxPass.Location = new System.Drawing.Point(262, 295);
            this.TextBoxPass.Name = "TextBoxPass";
            this.TextBoxPass.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPass.TabIndex = 142;
            this.TextBoxPass.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label66
            // 
            this.label66.AutoSize = true;
            this.label66.Location = new System.Drawing.Point(440, 270);
            this.label66.Name = "label66";
            this.label66.Size = new System.Drawing.Size(126, 16);
            this.label66.TabIndex = 157;
            this.label66.Text = "Inspection Status";
            // 
            // label52
            // 
            this.label52.AutoSize = true;
            this.label52.Location = new System.Drawing.Point(16, 298);
            this.label52.Name = "label52";
            this.label52.Size = new System.Drawing.Size(43, 16);
            this.label52.TabIndex = 141;
            this.label52.Text = "Pass";
            // 
            // label9
            // 
            this.label9.AutoSize = true;
            this.label9.Location = new System.Drawing.Point(441, 81);
            this.label9.Name = "label9";
            this.label9.Size = new System.Drawing.Size(102, 16);
            this.label9.TabIndex = 6;
            this.label9.Text = "Line 2 Current";
            // 
            // TextBoxYield
            // 
            this.TextBoxYield.Enabled = false;
            this.TextBoxYield.Location = new System.Drawing.Point(262, 268);
            this.TextBoxYield.Name = "TextBoxYield";
            this.TextBoxYield.Size = new System.Drawing.Size(100, 22);
            this.TextBoxYield.TabIndex = 140;
            this.TextBoxYield.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxOEE
            // 
            this.TextBoxOEE.Enabled = false;
            this.TextBoxOEE.Location = new System.Drawing.Point(696, 240);
            this.TextBoxOEE.Name = "TextBoxOEE";
            this.TextBoxOEE.Size = new System.Drawing.Size(100, 22);
            this.TextBoxOEE.TabIndex = 156;
            this.TextBoxOEE.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label53
            // 
            this.label53.AutoSize = true;
            this.label53.Location = new System.Drawing.Point(16, 271);
            this.label53.Name = "label53";
            this.label53.Size = new System.Drawing.Size(44, 16);
            this.label53.TabIndex = 139;
            this.label53.Text = "Yield";
            // 
            // label11
            // 
            this.label11.AutoSize = true;
            this.label11.Location = new System.Drawing.Point(441, 108);
            this.label11.Name = "label11";
            this.label11.Size = new System.Drawing.Size(102, 16);
            this.label11.TabIndex = 8;
            this.label11.Text = "Line 3 Current";
            // 
            // TextBoxMachineIdletimeHours
            // 
            this.TextBoxMachineIdletimeHours.Enabled = false;
            this.TextBoxMachineIdletimeHours.Location = new System.Drawing.Point(262, 239);
            this.TextBoxMachineIdletimeHours.Name = "TextBoxMachineIdletimeHours";
            this.TextBoxMachineIdletimeHours.Size = new System.Drawing.Size(100, 22);
            this.TextBoxMachineIdletimeHours.TabIndex = 138;
            this.TextBoxMachineIdletimeHours.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label78
            // 
            this.label78.AutoSize = true;
            this.label78.Location = new System.Drawing.Point(441, 241);
            this.label78.Name = "label78";
            this.label78.Size = new System.Drawing.Size(39, 16);
            this.label78.TabIndex = 155;
            this.label78.Text = "OEE";
            // 
            // label54
            // 
            this.label54.AutoSize = true;
            this.label54.Location = new System.Drawing.Point(16, 242);
            this.label54.Name = "label54";
            this.label54.Size = new System.Drawing.Size(190, 16);
            this.label54.TabIndex = 137;
            this.label54.Text = "Machine Idle Time (Hours)";
            // 
            // TextBoxMachineDowntimeHours
            // 
            this.TextBoxMachineDowntimeHours.Enabled = false;
            this.TextBoxMachineDowntimeHours.Location = new System.Drawing.Point(262, 211);
            this.TextBoxMachineDowntimeHours.Name = "TextBoxMachineDowntimeHours";
            this.TextBoxMachineDowntimeHours.Size = new System.Drawing.Size(100, 22);
            this.TextBoxMachineDowntimeHours.TabIndex = 136;
            this.TextBoxMachineDowntimeHours.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label13
            // 
            this.label13.AutoSize = true;
            this.label13.Location = new System.Drawing.Point(441, 133);
            this.label13.Name = "label13";
            this.label13.Size = new System.Drawing.Size(160, 16);
            this.label13.TabIndex = 10;
            this.label13.Text = "Total Air Consumption";
            // 
            // label55
            // 
            this.label55.AutoSize = true;
            this.label55.Location = new System.Drawing.Point(16, 214);
            this.label55.Name = "label55";
            this.label55.Size = new System.Drawing.Size(202, 16);
            this.label55.TabIndex = 135;
            this.label55.Text = "Machine Down Time (Hours)";
            // 
            // TextBoxMachineIdletimeMinutes
            // 
            this.TextBoxMachineIdletimeMinutes.Enabled = false;
            this.TextBoxMachineIdletimeMinutes.Location = new System.Drawing.Point(696, 211);
            this.TextBoxMachineIdletimeMinutes.Name = "TextBoxMachineIdletimeMinutes";
            this.TextBoxMachineIdletimeMinutes.Size = new System.Drawing.Size(100, 22);
            this.TextBoxMachineIdletimeMinutes.TabIndex = 150;
            this.TextBoxMachineIdletimeMinutes.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxMachineUptimeHours
            // 
            this.TextBoxMachineUptimeHours.Enabled = false;
            this.TextBoxMachineUptimeHours.Location = new System.Drawing.Point(262, 183);
            this.TextBoxMachineUptimeHours.Name = "TextBoxMachineUptimeHours";
            this.TextBoxMachineUptimeHours.Size = new System.Drawing.Size(100, 22);
            this.TextBoxMachineUptimeHours.TabIndex = 134;
            this.TextBoxMachineUptimeHours.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxLineToLineVoltage
            // 
            this.TextBoxLineToLineVoltage.Enabled = false;
            this.TextBoxLineToLineVoltage.Location = new System.Drawing.Point(696, 17);
            this.TextBoxLineToLineVoltage.Name = "TextBoxLineToLineVoltage";
            this.TextBoxLineToLineVoltage.Size = new System.Drawing.Size(100, 22);
            this.TextBoxLineToLineVoltage.TabIndex = 28;
            this.TextBoxLineToLineVoltage.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label56
            // 
            this.label56.AutoSize = true;
            this.label56.Location = new System.Drawing.Point(16, 186);
            this.label56.Name = "label56";
            this.label56.Size = new System.Drawing.Size(184, 16);
            this.label56.TabIndex = 133;
            this.label56.Text = "Machine Up Time (Hours)";
            // 
            // label50
            // 
            this.label50.AutoSize = true;
            this.label50.Location = new System.Drawing.Point(441, 213);
            this.label50.Name = "label50";
            this.label50.Size = new System.Drawing.Size(202, 16);
            this.label50.TabIndex = 149;
            this.label50.Text = "Machine Idle Time (Minutes)";
            // 
            // TextBoxWholeTrayCycleTime
            // 
            this.TextBoxWholeTrayCycleTime.Enabled = false;
            this.TextBoxWholeTrayCycleTime.Location = new System.Drawing.Point(262, 157);
            this.TextBoxWholeTrayCycleTime.Name = "TextBoxWholeTrayCycleTime";
            this.TextBoxWholeTrayCycleTime.Size = new System.Drawing.Size(100, 22);
            this.TextBoxWholeTrayCycleTime.TabIndex = 132;
            this.TextBoxWholeTrayCycleTime.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxLine1Current
            // 
            this.TextBoxLine1Current.Enabled = false;
            this.TextBoxLine1Current.Location = new System.Drawing.Point(696, 47);
            this.TextBoxLine1Current.Name = "TextBoxLine1Current";
            this.TextBoxLine1Current.Size = new System.Drawing.Size(100, 22);
            this.TextBoxLine1Current.TabIndex = 29;
            this.TextBoxLine1Current.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label57
            // 
            this.label57.AutoSize = true;
            this.label57.Location = new System.Drawing.Point(16, 160);
            this.label57.Name = "label57";
            this.label57.Size = new System.Drawing.Size(170, 16);
            this.label57.TabIndex = 131;
            this.label57.Text = "Whole Tray Cycle Time";
            // 
            // TextBoxMachineDowntimeMinutes
            // 
            this.TextBoxMachineDowntimeMinutes.Enabled = false;
            this.TextBoxMachineDowntimeMinutes.Location = new System.Drawing.Point(696, 182);
            this.TextBoxMachineDowntimeMinutes.Name = "TextBoxMachineDowntimeMinutes";
            this.TextBoxMachineDowntimeMinutes.Size = new System.Drawing.Size(100, 22);
            this.TextBoxMachineDowntimeMinutes.TabIndex = 148;
            this.TextBoxMachineDowntimeMinutes.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxIncomingPressure
            // 
            this.TextBoxIncomingPressure.Enabled = false;
            this.TextBoxIncomingPressure.Location = new System.Drawing.Point(262, 131);
            this.TextBoxIncomingPressure.Name = "TextBoxIncomingPressure";
            this.TextBoxIncomingPressure.Size = new System.Drawing.Size(100, 22);
            this.TextBoxIncomingPressure.TabIndex = 27;
            this.TextBoxIncomingPressure.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxLine2Current
            // 
            this.TextBoxLine2Current.Enabled = false;
            this.TextBoxLine2Current.Location = new System.Drawing.Point(696, 77);
            this.TextBoxLine2Current.Name = "TextBoxLine2Current";
            this.TextBoxLine2Current.Size = new System.Drawing.Size(100, 22);
            this.TextBoxLine2Current.TabIndex = 30;
            this.TextBoxLine2Current.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxLine3ToNeutralVoltage
            // 
            this.TextBoxLine3ToNeutralVoltage.Enabled = false;
            this.TextBoxLine3ToNeutralVoltage.Location = new System.Drawing.Point(262, 106);
            this.TextBoxLine3ToNeutralVoltage.Name = "TextBoxLine3ToNeutralVoltage";
            this.TextBoxLine3ToNeutralVoltage.Size = new System.Drawing.Size(100, 22);
            this.TextBoxLine3ToNeutralVoltage.TabIndex = 26;
            this.TextBoxLine3ToNeutralVoltage.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxLine3Current
            // 
            this.TextBoxLine3Current.Enabled = false;
            this.TextBoxLine3Current.Location = new System.Drawing.Point(696, 104);
            this.TextBoxLine3Current.Name = "TextBoxLine3Current";
            this.TextBoxLine3Current.Size = new System.Drawing.Size(100, 22);
            this.TextBoxLine3Current.TabIndex = 31;
            this.TextBoxLine3Current.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxLine2ToNeutralVoltage
            // 
            this.TextBoxLine2ToNeutralVoltage.Enabled = false;
            this.TextBoxLine2ToNeutralVoltage.Location = new System.Drawing.Point(262, 79);
            this.TextBoxLine2ToNeutralVoltage.Name = "TextBoxLine2ToNeutralVoltage";
            this.TextBoxLine2ToNeutralVoltage.Size = new System.Drawing.Size(100, 22);
            this.TextBoxLine2ToNeutralVoltage.TabIndex = 25;
            this.TextBoxLine2ToNeutralVoltage.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxMachineUptimeMinutes
            // 
            this.TextBoxMachineUptimeMinutes.Enabled = false;
            this.TextBoxMachineUptimeMinutes.Location = new System.Drawing.Point(696, 155);
            this.TextBoxMachineUptimeMinutes.Name = "TextBoxMachineUptimeMinutes";
            this.TextBoxMachineUptimeMinutes.Size = new System.Drawing.Size(100, 22);
            this.TextBoxMachineUptimeMinutes.TabIndex = 146;
            this.TextBoxMachineUptimeMinutes.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxLine1ToNeutralVoltage
            // 
            this.TextBoxLine1ToNeutralVoltage.Enabled = false;
            this.TextBoxLine1ToNeutralVoltage.Location = new System.Drawing.Point(262, 49);
            this.TextBoxLine1ToNeutralVoltage.Name = "TextBoxLine1ToNeutralVoltage";
            this.TextBoxLine1ToNeutralVoltage.Size = new System.Drawing.Size(100, 22);
            this.TextBoxLine1ToNeutralVoltage.TabIndex = 24;
            this.TextBoxLine1ToNeutralVoltage.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxTotalAirConsumption
            // 
            this.TextBoxTotalAirConsumption.Enabled = false;
            this.TextBoxTotalAirConsumption.Location = new System.Drawing.Point(696, 129);
            this.TextBoxTotalAirConsumption.Name = "TextBoxTotalAirConsumption";
            this.TextBoxTotalAirConsumption.Size = new System.Drawing.Size(100, 22);
            this.TextBoxTotalAirConsumption.TabIndex = 32;
            this.TextBoxTotalAirConsumption.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPowerConsumption
            // 
            this.TextBoxPowerConsumption.Enabled = false;
            this.TextBoxPowerConsumption.Location = new System.Drawing.Point(262, 20);
            this.TextBoxPowerConsumption.Name = "TextBoxPowerConsumption";
            this.TextBoxPowerConsumption.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPowerConsumption.TabIndex = 23;
            this.TextBoxPowerConsumption.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label59
            // 
            this.label59.AutoSize = true;
            this.label59.Location = new System.Drawing.Point(441, 159);
            this.label59.Name = "label59";
            this.label59.Size = new System.Drawing.Size(196, 16);
            this.label59.TabIndex = 145;
            this.label59.Text = "Machine Up Time (Minutes)";
            // 
            // label12
            // 
            this.label12.AutoSize = true;
            this.label12.Location = new System.Drawing.Point(16, 134);
            this.label12.Name = "label12";
            this.label12.Size = new System.Drawing.Size(136, 16);
            this.label12.TabIndex = 9;
            this.label12.Text = "Incoming Pressure";
            // 
            // TextBoxMainMachineTowerlight
            // 
            this.TextBoxMainMachineTowerlight.Enabled = false;
            this.TextBoxMainMachineTowerlight.Location = new System.Drawing.Point(696, 297);
            this.TextBoxMainMachineTowerlight.Name = "TextBoxMainMachineTowerlight";
            this.TextBoxMainMachineTowerlight.Size = new System.Drawing.Size(100, 22);
            this.TextBoxMainMachineTowerlight.TabIndex = 52;
            this.TextBoxMainMachineTowerlight.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label10
            // 
            this.label10.AutoSize = true;
            this.label10.Location = new System.Drawing.Point(16, 109);
            this.label10.Name = "label10";
            this.label10.Size = new System.Drawing.Size(184, 16);
            this.label10.TabIndex = 7;
            this.label10.Text = "Line 3 To Neutral Voltage";
            // 
            // label25
            // 
            this.label25.AutoSize = true;
            this.label25.Location = new System.Drawing.Point(440, 301);
            this.label25.Name = "label25";
            this.label25.Size = new System.Drawing.Size(127, 16);
            this.label25.TabIndex = 53;
            this.label25.Text = "Towerlight Status";
            // 
            // label8
            // 
            this.label8.AutoSize = true;
            this.label8.Location = new System.Drawing.Point(16, 82);
            this.label8.Name = "label8";
            this.label8.Size = new System.Drawing.Size(184, 16);
            this.label8.TabIndex = 5;
            this.label8.Text = "Line 2 To Neutral Voltage";
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Location = new System.Drawing.Point(16, 26);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(144, 16);
            this.label5.TabIndex = 2;
            this.label5.Text = "Power Consumption";
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Location = new System.Drawing.Point(16, 52);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(184, 16);
            this.label6.TabIndex = 3;
            this.label6.Text = "Line 1 To Neutral Voltage";
            // 
            // groupBox8
            // 
            this.groupBox8.Controls.Add(this.label64);
            this.groupBox8.Controls.Add(this.label63);
            this.groupBox8.Controls.Add(this.TextBoxProjectTime);
            this.groupBox8.Controls.Add(this.TextBoxProjectName);
            this.groupBox8.Controls.Add(this.label30);
            this.groupBox8.Controls.Add(this.TextBoxTrayComplete);
            this.groupBox8.Controls.Add(this.label29);
            this.groupBox8.Controls.Add(this.TextBoxProjectComplete);
            this.groupBox8.Location = new System.Drawing.Point(6, 366);
            this.groupBox8.Name = "groupBox8";
            this.groupBox8.Size = new System.Drawing.Size(875, 81);
            this.groupBox8.TabIndex = 159;
            this.groupBox8.TabStop = false;
            this.groupBox8.Text = "- Project -";
            // 
            // label64
            // 
            this.label64.AutoSize = true;
            this.label64.Location = new System.Drawing.Point(18, 26);
            this.label64.Name = "label64";
            this.label64.Size = new System.Drawing.Size(102, 16);
            this.label64.TabIndex = 153;
            this.label64.Text = "Project Name";
            // 
            // label63
            // 
            this.label63.AutoSize = true;
            this.label63.Location = new System.Drawing.Point(18, 55);
            this.label63.Name = "label63";
            this.label63.Size = new System.Drawing.Size(96, 16);
            this.label63.TabIndex = 151;
            this.label63.Text = "Project Time";
            // 
            // TextBoxProjectTime
            // 
            this.TextBoxProjectTime.Enabled = false;
            this.TextBoxProjectTime.Location = new System.Drawing.Point(262, 52);
            this.TextBoxProjectTime.Name = "TextBoxProjectTime";
            this.TextBoxProjectTime.Size = new System.Drawing.Size(100, 22);
            this.TextBoxProjectTime.TabIndex = 152;
            this.TextBoxProjectTime.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxProjectName
            // 
            this.TextBoxProjectName.Enabled = false;
            this.TextBoxProjectName.Location = new System.Drawing.Point(210, 19);
            this.TextBoxProjectName.Name = "TextBoxProjectName";
            this.TextBoxProjectName.Size = new System.Drawing.Size(194, 22);
            this.TextBoxProjectName.TabIndex = 154;
            this.TextBoxProjectName.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label30
            // 
            this.label30.AutoSize = true;
            this.label30.Location = new System.Drawing.Point(440, 52);
            this.label30.Name = "label30";
            this.label30.Size = new System.Drawing.Size(127, 16);
            this.label30.TabIndex = 59;
            this.label30.Text = "Project Complete";
            // 
            // TextBoxTrayComplete
            // 
            this.TextBoxTrayComplete.Enabled = false;
            this.TextBoxTrayComplete.Location = new System.Drawing.Point(695, 19);
            this.TextBoxTrayComplete.Name = "TextBoxTrayComplete";
            this.TextBoxTrayComplete.Size = new System.Drawing.Size(100, 22);
            this.TextBoxTrayComplete.TabIndex = 56;
            this.TextBoxTrayComplete.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label29
            // 
            this.label29.AutoSize = true;
            this.label29.Location = new System.Drawing.Point(440, 25);
            this.label29.Name = "label29";
            this.label29.Size = new System.Drawing.Size(110, 16);
            this.label29.TabIndex = 57;
            this.label29.Text = "Tray Complete";
            // 
            // TextBoxProjectComplete
            // 
            this.TextBoxProjectComplete.Enabled = false;
            this.TextBoxProjectComplete.Location = new System.Drawing.Point(695, 49);
            this.TextBoxProjectComplete.Name = "TextBoxProjectComplete";
            this.TextBoxProjectComplete.Size = new System.Drawing.Size(100, 22);
            this.TextBoxProjectComplete.TabIndex = 58;
            this.TextBoxProjectComplete.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // Tab3
            // 
            this.Tab3.Controls.Add(this.groupBox4);
            this.Tab3.Controls.Add(this.groupBox1);
            this.Tab3.Location = new System.Drawing.Point(4, 25);
            this.Tab3.Name = "Tab3";
            this.Tab3.Size = new System.Drawing.Size(887, 457);
            this.Tab3.TabIndex = 3;
            this.Tab3.Text = "Buffer Station & AIV";
            this.Tab3.UseVisualStyleBackColor = true;
            // 
            // groupBox4
            // 
            this.groupBox4.Controls.Add(this.label1);
            this.groupBox4.Controls.Add(this.TextBoxAGVTrayStatus);
            this.groupBox4.Controls.Add(this.label4);
            this.groupBox4.Controls.Add(this.TextBoxAGVLocationY);
            this.groupBox4.Controls.Add(this.label14);
            this.groupBox4.Controls.Add(this.TextBoxAGVLocationX);
            this.groupBox4.Controls.Add(this.label15);
            this.groupBox4.Controls.Add(this.TextBoxAGVStationBattery);
            this.groupBox4.Controls.Add(this.label18);
            this.groupBox4.Controls.Add(this.TextBoxAGVStationTowerlight);
            this.groupBox4.Location = new System.Drawing.Point(12, 232);
            this.groupBox4.Name = "groupBox4";
            this.groupBox4.Size = new System.Drawing.Size(866, 218);
            this.groupBox4.TabIndex = 82;
            this.groupBox4.TabStop = false;
            this.groupBox4.Text = "- AIV -";
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(410, 113);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(87, 16);
            this.label1.TabIndex = 88;
            this.label1.Text = "Tray Status";
            // 
            // TextBoxAGVTrayStatus
            // 
            this.TextBoxAGVTrayStatus.Enabled = false;
            this.TextBoxAGVTrayStatus.Location = new System.Drawing.Point(578, 111);
            this.TextBoxAGVTrayStatus.Name = "TextBoxAGVTrayStatus";
            this.TextBoxAGVTrayStatus.Size = new System.Drawing.Size(100, 22);
            this.TextBoxAGVTrayStatus.TabIndex = 87;
            this.TextBoxAGVTrayStatus.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(41, 170);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(81, 16);
            this.label4.TabIndex = 86;
            this.label4.Text = "Location Y";
            // 
            // TextBoxAGVLocationY
            // 
            this.TextBoxAGVLocationY.Enabled = false;
            this.TextBoxAGVLocationY.Location = new System.Drawing.Point(217, 167);
            this.TextBoxAGVLocationY.Name = "TextBoxAGVLocationY";
            this.TextBoxAGVLocationY.Size = new System.Drawing.Size(100, 22);
            this.TextBoxAGVLocationY.TabIndex = 85;
            this.TextBoxAGVLocationY.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label14
            // 
            this.label14.AutoSize = true;
            this.label14.Location = new System.Drawing.Point(41, 113);
            this.label14.Name = "label14";
            this.label14.Size = new System.Drawing.Size(80, 16);
            this.label14.TabIndex = 84;
            this.label14.Text = "Location X";
            // 
            // TextBoxAGVLocationX
            // 
            this.TextBoxAGVLocationX.Enabled = false;
            this.TextBoxAGVLocationX.Location = new System.Drawing.Point(217, 110);
            this.TextBoxAGVLocationX.Name = "TextBoxAGVLocationX";
            this.TextBoxAGVLocationX.Size = new System.Drawing.Size(100, 22);
            this.TextBoxAGVLocationX.TabIndex = 83;
            this.TextBoxAGVLocationX.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label15
            // 
            this.label15.AutoSize = true;
            this.label15.Location = new System.Drawing.Point(410, 56);
            this.label15.Name = "label15";
            this.label15.Size = new System.Drawing.Size(104, 16);
            this.label15.TabIndex = 82;
            this.label15.Text = "Battery Status";
            // 
            // TextBoxAGVStationBattery
            // 
            this.TextBoxAGVStationBattery.Enabled = false;
            this.TextBoxAGVStationBattery.Location = new System.Drawing.Point(578, 53);
            this.TextBoxAGVStationBattery.Name = "TextBoxAGVStationBattery";
            this.TextBoxAGVStationBattery.Size = new System.Drawing.Size(100, 22);
            this.TextBoxAGVStationBattery.TabIndex = 81;
            this.TextBoxAGVStationBattery.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label18
            // 
            this.label18.AutoSize = true;
            this.label18.Location = new System.Drawing.Point(41, 56);
            this.label18.Name = "label18";
            this.label18.Size = new System.Drawing.Size(127, 16);
            this.label18.TabIndex = 80;
            this.label18.Text = "Towerlight Status";
            // 
            // TextBoxAGVStationTowerlight
            // 
            this.TextBoxAGVStationTowerlight.Enabled = false;
            this.TextBoxAGVStationTowerlight.Location = new System.Drawing.Point(217, 53);
            this.TextBoxAGVStationTowerlight.Name = "TextBoxAGVStationTowerlight";
            this.TextBoxAGVStationTowerlight.Size = new System.Drawing.Size(100, 22);
            this.TextBoxAGVStationTowerlight.TabIndex = 79;
            this.TextBoxAGVStationTowerlight.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // groupBox1
            // 
            this.groupBox1.Controls.Add(this.label22);
            this.groupBox1.Controls.Add(this.TextBoxBufferStationTowerLight);
            this.groupBox1.Controls.Add(this.label21);
            this.groupBox1.Controls.Add(this.TextBoxBufferStationLoader);
            this.groupBox1.Controls.Add(this.label19);
            this.groupBox1.Controls.Add(this.TextBoxBufferStationUnLoader);
            this.groupBox1.Location = new System.Drawing.Point(12, 13);
            this.groupBox1.Name = "groupBox1";
            this.groupBox1.Size = new System.Drawing.Size(866, 213);
            this.groupBox1.TabIndex = 81;
            this.groupBox1.TabStop = false;
            this.groupBox1.Text = "- Buffer Station -";
            // 
            // label22
            // 
            this.label22.AutoSize = true;
            this.label22.Location = new System.Drawing.Point(41, 62);
            this.label22.Name = "label22";
            this.label22.Size = new System.Drawing.Size(127, 16);
            this.label22.TabIndex = 80;
            this.label22.Text = "Towerlight Status";
            // 
            // TextBoxBufferStationTowerLight
            // 
            this.TextBoxBufferStationTowerLight.Enabled = false;
            this.TextBoxBufferStationTowerLight.Location = new System.Drawing.Point(217, 59);
            this.TextBoxBufferStationTowerLight.Name = "TextBoxBufferStationTowerLight";
            this.TextBoxBufferStationTowerLight.Size = new System.Drawing.Size(100, 22);
            this.TextBoxBufferStationTowerLight.TabIndex = 79;
            this.TextBoxBufferStationTowerLight.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label21
            // 
            this.label21.AutoSize = true;
            this.label21.Location = new System.Drawing.Point(41, 109);
            this.label21.Name = "label21";
            this.label21.Size = new System.Drawing.Size(108, 16);
            this.label21.TabIndex = 66;
            this.label21.Text = "Loader Status ";
            // 
            // TextBoxBufferStationLoader
            // 
            this.TextBoxBufferStationLoader.Enabled = false;
            this.TextBoxBufferStationLoader.Location = new System.Drawing.Point(217, 106);
            this.TextBoxBufferStationLoader.Name = "TextBoxBufferStationLoader";
            this.TextBoxBufferStationLoader.Size = new System.Drawing.Size(100, 22);
            this.TextBoxBufferStationLoader.TabIndex = 65;
            this.TextBoxBufferStationLoader.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label19
            // 
            this.label19.AutoSize = true;
            this.label19.Location = new System.Drawing.Point(41, 158);
            this.label19.Name = "label19";
            this.label19.Size = new System.Drawing.Size(119, 16);
            this.label19.TabIndex = 68;
            this.label19.Text = "Unloader Status";
            // 
            // TextBoxBufferStationUnLoader
            // 
            this.TextBoxBufferStationUnLoader.Enabled = false;
            this.TextBoxBufferStationUnLoader.Location = new System.Drawing.Point(217, 155);
            this.TextBoxBufferStationUnLoader.Name = "TextBoxBufferStationUnLoader";
            this.TextBoxBufferStationUnLoader.Size = new System.Drawing.Size(100, 22);
            this.TextBoxBufferStationUnLoader.TabIndex = 67;
            this.TextBoxBufferStationUnLoader.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // Tab4
            // 
            this.Tab4.Controls.Add(this.groupBox3);
            this.Tab4.Controls.Add(this.groupBox2);
            this.Tab4.Location = new System.Drawing.Point(4, 25);
            this.Tab4.Name = "Tab4";
            this.Tab4.Size = new System.Drawing.Size(887, 457);
            this.Tab4.TabIndex = 4;
            this.Tab4.Text = "Omron & TM Robot ";
            this.Tab4.UseVisualStyleBackColor = true;
            // 
            // groupBox3
            // 
            this.groupBox3.Controls.Add(this.TextBoxTMRobotTemperature);
            this.groupBox3.Controls.Add(this.label28);
            this.groupBox3.Controls.Add(this.TextBoxTMRobotCurrent);
            this.groupBox3.Controls.Add(this.tm_robot_current);
            this.groupBox3.Controls.Add(this.TextBoxTMRobotVoltage);
            this.groupBox3.Controls.Add(this.TextBoxTMRobotPowerConsumption);
            this.groupBox3.Controls.Add(this.tm_robot_voltage);
            this.groupBox3.Controls.Add(this.label27);
            this.groupBox3.Location = new System.Drawing.Point(3, 225);
            this.groupBox3.Name = "groupBox3";
            this.groupBox3.Size = new System.Drawing.Size(881, 222);
            this.groupBox3.TabIndex = 70;
            this.groupBox3.TabStop = false;
            this.groupBox3.Text = "- TM Robot -";
            // 
            // TextBoxTMRobotTemperature
            // 
            this.TextBoxTMRobotTemperature.Enabled = false;
            this.TextBoxTMRobotTemperature.Location = new System.Drawing.Point(725, 152);
            this.TextBoxTMRobotTemperature.Name = "TextBoxTMRobotTemperature";
            this.TextBoxTMRobotTemperature.Size = new System.Drawing.Size(100, 22);
            this.TextBoxTMRobotTemperature.TabIndex = 86;
            this.TextBoxTMRobotTemperature.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label28
            // 
            this.label28.AutoSize = true;
            this.label28.Location = new System.Drawing.Point(439, 155);
            this.label28.Name = "label28";
            this.label28.Size = new System.Drawing.Size(169, 16);
            this.label28.TabIndex = 85;
            this.label28.Text = "TM Robot Temperature";
            // 
            // TextBoxTMRobotCurrent
            // 
            this.TextBoxTMRobotCurrent.Enabled = false;
            this.TextBoxTMRobotCurrent.Location = new System.Drawing.Point(725, 57);
            this.TextBoxTMRobotCurrent.Name = "TextBoxTMRobotCurrent";
            this.TextBoxTMRobotCurrent.Size = new System.Drawing.Size(100, 22);
            this.TextBoxTMRobotCurrent.TabIndex = 84;
            this.TextBoxTMRobotCurrent.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // tm_robot_current
            // 
            this.tm_robot_current.AutoSize = true;
            this.tm_robot_current.Location = new System.Drawing.Point(439, 60);
            this.tm_robot_current.Name = "tm_robot_current";
            this.tm_robot_current.Size = new System.Drawing.Size(129, 16);
            this.tm_robot_current.TabIndex = 83;
            this.tm_robot_current.Text = "TM Robot Current";
            // 
            // TextBoxTMRobotVoltage
            // 
            this.TextBoxTMRobotVoltage.Enabled = false;
            this.TextBoxTMRobotVoltage.Location = new System.Drawing.Point(297, 152);
            this.TextBoxTMRobotVoltage.Name = "TextBoxTMRobotVoltage";
            this.TextBoxTMRobotVoltage.Size = new System.Drawing.Size(100, 22);
            this.TextBoxTMRobotVoltage.TabIndex = 82;
            this.TextBoxTMRobotVoltage.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxTMRobotPowerConsumption
            // 
            this.TextBoxTMRobotPowerConsumption.Enabled = false;
            this.TextBoxTMRobotPowerConsumption.Location = new System.Drawing.Point(297, 60);
            this.TextBoxTMRobotPowerConsumption.Name = "TextBoxTMRobotPowerConsumption";
            this.TextBoxTMRobotPowerConsumption.Size = new System.Drawing.Size(100, 22);
            this.TextBoxTMRobotPowerConsumption.TabIndex = 81;
            this.TextBoxTMRobotPowerConsumption.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // tm_robot_voltage
            // 
            this.tm_robot_voltage.AutoSize = true;
            this.tm_robot_voltage.Location = new System.Drawing.Point(32, 155);
            this.tm_robot_voltage.Name = "tm_robot_voltage";
            this.tm_robot_voltage.Size = new System.Drawing.Size(134, 16);
            this.tm_robot_voltage.TabIndex = 80;
            this.tm_robot_voltage.Text = "TM Robot Voltage";
            // 
            // label27
            // 
            this.label27.AutoSize = true;
            this.label27.Location = new System.Drawing.Point(32, 63);
            this.label27.Name = "label27";
            this.label27.Size = new System.Drawing.Size(216, 16);
            this.label27.TabIndex = 79;
            this.label27.Text = "TM Robot Power Consumption";
            // 
            // groupBox2
            // 
            this.groupBox2.Controls.Add(this.label17);
            this.groupBox2.Controls.Add(this.label16);
            this.groupBox2.Controls.Add(this.label20);
            this.groupBox2.Controls.Add(this.TextBoxServoMotor4Position);
            this.groupBox2.Controls.Add(this.label23);
            this.groupBox2.Controls.Add(this.TextBoxServoMotor3Position);
            this.groupBox2.Controls.Add(this.TextBoxServoMotor1Position);
            this.groupBox2.Controls.Add(this.TextBoxServoMotor2Position);
            this.groupBox2.Location = new System.Drawing.Point(3, 3);
            this.groupBox2.Name = "groupBox2";
            this.groupBox2.Size = new System.Drawing.Size(881, 216);
            this.groupBox2.TabIndex = 69;
            this.groupBox2.TabStop = false;
            this.groupBox2.Text = "- Omron -";
            // 
            // label17
            // 
            this.label17.AutoSize = true;
            this.label17.Location = new System.Drawing.Point(32, 145);
            this.label17.Name = "label17";
            this.label17.Size = new System.Drawing.Size(213, 16);
            this.label17.TabIndex = 50;
            this.label17.Text = "Omron Servo Motor 2 Position";
            // 
            // label16
            // 
            this.label16.AutoSize = true;
            this.label16.Location = new System.Drawing.Point(32, 48);
            this.label16.Name = "label16";
            this.label16.Size = new System.Drawing.Size(213, 16);
            this.label16.TabIndex = 47;
            this.label16.Text = "Omron Servo Motor 1 Position";
            // 
            // label20
            // 
            this.label20.AutoSize = true;
            this.label20.Location = new System.Drawing.Point(439, 48);
            this.label20.Name = "label20";
            this.label20.Size = new System.Drawing.Size(213, 16);
            this.label20.TabIndex = 53;
            this.label20.Text = "Omron Servo Motor 3 Position";
            // 
            // TextBoxServoMotor4Position
            // 
            this.TextBoxServoMotor4Position.Enabled = false;
            this.TextBoxServoMotor4Position.Location = new System.Drawing.Point(725, 142);
            this.TextBoxServoMotor4Position.Name = "TextBoxServoMotor4Position";
            this.TextBoxServoMotor4Position.Size = new System.Drawing.Size(100, 22);
            this.TextBoxServoMotor4Position.TabIndex = 68;
            this.TextBoxServoMotor4Position.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label23
            // 
            this.label23.AutoSize = true;
            this.label23.Location = new System.Drawing.Point(439, 145);
            this.label23.Name = "label23";
            this.label23.Size = new System.Drawing.Size(213, 16);
            this.label23.TabIndex = 56;
            this.label23.Text = "Omron Servo Motor 4 Position";
            // 
            // TextBoxServoMotor3Position
            // 
            this.TextBoxServoMotor3Position.Enabled = false;
            this.TextBoxServoMotor3Position.Location = new System.Drawing.Point(725, 42);
            this.TextBoxServoMotor3Position.Name = "TextBoxServoMotor3Position";
            this.TextBoxServoMotor3Position.Size = new System.Drawing.Size(100, 22);
            this.TextBoxServoMotor3Position.TabIndex = 65;
            this.TextBoxServoMotor3Position.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxServoMotor1Position
            // 
            this.TextBoxServoMotor1Position.Enabled = false;
            this.TextBoxServoMotor1Position.Location = new System.Drawing.Point(297, 45);
            this.TextBoxServoMotor1Position.Name = "TextBoxServoMotor1Position";
            this.TextBoxServoMotor1Position.Size = new System.Drawing.Size(100, 22);
            this.TextBoxServoMotor1Position.TabIndex = 59;
            this.TextBoxServoMotor1Position.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxServoMotor2Position
            // 
            this.TextBoxServoMotor2Position.Enabled = false;
            this.TextBoxServoMotor2Position.Location = new System.Drawing.Point(297, 142);
            this.TextBoxServoMotor2Position.Name = "TextBoxServoMotor2Position";
            this.TextBoxServoMotor2Position.Size = new System.Drawing.Size(100, 22);
            this.TextBoxServoMotor2Position.TabIndex = 62;
            this.TextBoxServoMotor2Position.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // Tab5
            // 
            this.Tab5.Controls.Add(this.TextBoxCurrentTrayNumber);
            this.Tab5.Controls.Add(this.label65);
            this.Tab5.Controls.Add(this.TextBoxPicaCode);
            this.Tab5.Controls.Add(this.label62);
            this.Tab5.Controls.Add(this.TextBoxPen15Status);
            this.Tab5.Controls.Add(this.TextBoxPen14Status);
            this.Tab5.Controls.Add(this.TextBoxPen13Status);
            this.Tab5.Controls.Add(this.TextBoxPen12Status);
            this.Tab5.Controls.Add(this.TextBoxPen11Status);
            this.Tab5.Controls.Add(this.TextBoxPen10Status);
            this.Tab5.Controls.Add(this.TextBoxPen9Status);
            this.Tab5.Controls.Add(this.TextBoxPen8Status);
            this.Tab5.Controls.Add(this.TextBoxPen7Status);
            this.Tab5.Controls.Add(this.TextBoxPen6Status);
            this.Tab5.Controls.Add(this.TextBoxPen5Status);
            this.Tab5.Controls.Add(this.TextBoxPen4Status);
            this.Tab5.Controls.Add(this.TextBoxPen3Status);
            this.Tab5.Controls.Add(this.TextBoxPen2Status);
            this.Tab5.Controls.Add(this.TextBoxPen1Status);
            this.Tab5.Controls.Add(this.label2);
            this.Tab5.Controls.Add(this.label77);
            this.Tab5.Controls.Add(this.label76);
            this.Tab5.Controls.Add(this.label75);
            this.Tab5.Controls.Add(this.label74);
            this.Tab5.Controls.Add(this.label73);
            this.Tab5.Controls.Add(this.label72);
            this.Tab5.Controls.Add(this.label71);
            this.Tab5.Controls.Add(this.label70);
            this.Tab5.Controls.Add(this.label69);
            this.Tab5.Controls.Add(this.label68);
            this.Tab5.Controls.Add(this.label67);
            this.Tab5.Controls.Add(this.label61);
            this.Tab5.Controls.Add(this.label60);
            this.Tab5.Controls.Add(this.label47);
            this.Tab5.Controls.Add(this.label46);
            this.Tab5.Controls.Add(this.TextBoxPen15CycleTime);
            this.Tab5.Controls.Add(this.TextBoxPen15Cam5);
            this.Tab5.Controls.Add(this.TextBoxPen15Cam4);
            this.Tab5.Controls.Add(this.TextBoxPen15Cam3);
            this.Tab5.Controls.Add(this.TextBoxPen15Cam2);
            this.Tab5.Controls.Add(this.TextBoxPen15Cam1);
            this.Tab5.Controls.Add(this.TextBoxPen14CycleTime);
            this.Tab5.Controls.Add(this.TextBoxPen14Cam5);
            this.Tab5.Controls.Add(this.TextBoxPen14Cam4);
            this.Tab5.Controls.Add(this.TextBoxPen14Cam3);
            this.Tab5.Controls.Add(this.TextBoxPen14Cam2);
            this.Tab5.Controls.Add(this.TextBoxPen14Cam1);
            this.Tab5.Controls.Add(this.TextBoxPen13CycleTime);
            this.Tab5.Controls.Add(this.TextBoxPen13Cam5);
            this.Tab5.Controls.Add(this.TextBoxPen13Cam4);
            this.Tab5.Controls.Add(this.TextBoxPen13Cam3);
            this.Tab5.Controls.Add(this.TextBoxPen13Cam2);
            this.Tab5.Controls.Add(this.TextBoxPen13Cam1);
            this.Tab5.Controls.Add(this.TextBoxPen12CycleTime);
            this.Tab5.Controls.Add(this.TextBoxPen12Cam5);
            this.Tab5.Controls.Add(this.TextBoxPen12Cam4);
            this.Tab5.Controls.Add(this.TextBoxPen12Cam3);
            this.Tab5.Controls.Add(this.TextBoxPen12Cam2);
            this.Tab5.Controls.Add(this.TextBoxPen12Cam1);
            this.Tab5.Controls.Add(this.TextBoxPen11CycleTime);
            this.Tab5.Controls.Add(this.TextBoxPen11Cam5);
            this.Tab5.Controls.Add(this.TextBoxPen11Cam4);
            this.Tab5.Controls.Add(this.TextBoxPen11Cam3);
            this.Tab5.Controls.Add(this.TextBoxPen11Cam2);
            this.Tab5.Controls.Add(this.TextBoxPen11Cam1);
            this.Tab5.Controls.Add(this.TextBoxPen10CycleTime);
            this.Tab5.Controls.Add(this.TextBoxPen10Cam5);
            this.Tab5.Controls.Add(this.TextBoxPen10Cam4);
            this.Tab5.Controls.Add(this.TextBoxPen10Cam3);
            this.Tab5.Controls.Add(this.TextBoxPen10Cam2);
            this.Tab5.Controls.Add(this.TextBoxPen10Cam1);
            this.Tab5.Controls.Add(this.TextBoxPen9CycleTime);
            this.Tab5.Controls.Add(this.TextBoxPen9Cam5);
            this.Tab5.Controls.Add(this.TextBoxPen9Cam4);
            this.Tab5.Controls.Add(this.TextBoxPen9Cam3);
            this.Tab5.Controls.Add(this.TextBoxPen9Cam2);
            this.Tab5.Controls.Add(this.TextBoxPen9Cam1);
            this.Tab5.Controls.Add(this.TextBoxPen8CycleTime);
            this.Tab5.Controls.Add(this.TextBoxPen8Cam5);
            this.Tab5.Controls.Add(this.TextBoxPen8Cam4);
            this.Tab5.Controls.Add(this.TextBoxPen8Cam3);
            this.Tab5.Controls.Add(this.TextBoxPen8Cam2);
            this.Tab5.Controls.Add(this.TextBoxPen8Cam1);
            this.Tab5.Controls.Add(this.TextBoxPen7CycleTime);
            this.Tab5.Controls.Add(this.TextBoxPen7Cam5);
            this.Tab5.Controls.Add(this.TextBoxPen7Cam4);
            this.Tab5.Controls.Add(this.TextBoxPen7Cam3);
            this.Tab5.Controls.Add(this.TextBoxPen7Cam2);
            this.Tab5.Controls.Add(this.TextBoxPen7Cam1);
            this.Tab5.Controls.Add(this.TextBoxPen6CycleTime);
            this.Tab5.Controls.Add(this.TextBoxPen6Cam5);
            this.Tab5.Controls.Add(this.TextBoxPen6Cam4);
            this.Tab5.Controls.Add(this.TextBoxPen6Cam3);
            this.Tab5.Controls.Add(this.TextBoxPen6Cam2);
            this.Tab5.Controls.Add(this.TextBoxPen6Cam1);
            this.Tab5.Controls.Add(this.TextBoxPen5CycleTime);
            this.Tab5.Controls.Add(this.TextBoxPen5Cam5);
            this.Tab5.Controls.Add(this.TextBoxPen5Cam4);
            this.Tab5.Controls.Add(this.TextBoxPen5Cam3);
            this.Tab5.Controls.Add(this.TextBoxPen5Cam2);
            this.Tab5.Controls.Add(this.TextBoxPen5Cam1);
            this.Tab5.Controls.Add(this.TextBoxPen4CycleTime);
            this.Tab5.Controls.Add(this.TextBoxPen4Cam5);
            this.Tab5.Controls.Add(this.TextBoxPen4Cam4);
            this.Tab5.Controls.Add(this.TextBoxPen4Cam3);
            this.Tab5.Controls.Add(this.TextBoxPen4Cam2);
            this.Tab5.Controls.Add(this.TextBoxPen4Cam1);
            this.Tab5.Controls.Add(this.TextBoxPen3CycleTime);
            this.Tab5.Controls.Add(this.TextBoxPen3Cam5);
            this.Tab5.Controls.Add(this.TextBoxPen3Cam4);
            this.Tab5.Controls.Add(this.TextBoxPen3Cam3);
            this.Tab5.Controls.Add(this.TextBoxPen3Cam2);
            this.Tab5.Controls.Add(this.TextBoxPen3Cam1);
            this.Tab5.Controls.Add(this.TextBoxPen2CycleTime);
            this.Tab5.Controls.Add(this.TextBoxPen2Cam5);
            this.Tab5.Controls.Add(this.TextBoxPen2Cam4);
            this.Tab5.Controls.Add(this.TextBoxPen2Cam3);
            this.Tab5.Controls.Add(this.TextBoxPen2Cam2);
            this.Tab5.Controls.Add(this.TextBoxPen2Cam1);
            this.Tab5.Controls.Add(this.TextBoxLocation);
            this.Tab5.Controls.Add(this.label40);
            this.Tab5.Controls.Add(this.TextBoxPenID);
            this.Tab5.Controls.Add(this.label41);
            this.Tab5.Controls.Add(this.TextBoxPen1CycleTime);
            this.Tab5.Controls.Add(this.label49);
            this.Tab5.Controls.Add(this.TextBoxPen1Cam5);
            this.Tab5.Controls.Add(this.label48);
            this.Tab5.Controls.Add(this.TextBoxPen1Cam4);
            this.Tab5.Controls.Add(this.label44);
            this.Tab5.Controls.Add(this.TextBoxPen1Cam3);
            this.Tab5.Controls.Add(this.label45);
            this.Tab5.Controls.Add(this.TextBoxPen1Cam2);
            this.Tab5.Controls.Add(this.label43);
            this.Tab5.Controls.Add(this.TextBoxPen1Cam1);
            this.Tab5.Controls.Add(this.label42);
            this.Tab5.Location = new System.Drawing.Point(4, 25);
            this.Tab5.Name = "Tab5";
            this.Tab5.Size = new System.Drawing.Size(887, 457);
            this.Tab5.TabIndex = 2;
            this.Tab5.Text = "PEN Data ";
            this.Tab5.UseVisualStyleBackColor = true;
            // 
            // TextBoxCurrentTrayNumber
            // 
            this.TextBoxCurrentTrayNumber.Enabled = false;
            this.TextBoxCurrentTrayNumber.Location = new System.Drawing.Point(682, 13);
            this.TextBoxCurrentTrayNumber.Name = "TextBoxCurrentTrayNumber";
            this.TextBoxCurrentTrayNumber.Size = new System.Drawing.Size(36, 22);
            this.TextBoxCurrentTrayNumber.TabIndex = 225;
            this.TextBoxCurrentTrayNumber.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label65
            // 
            this.label65.AutoSize = true;
            this.label65.Location = new System.Drawing.Point(522, 16);
            this.label65.Name = "label65";
            this.label65.Size = new System.Drawing.Size(151, 16);
            this.label65.TabIndex = 224;
            this.label65.Text = "Current Tray Number";
            // 
            // TextBoxPicaCode
            // 
            this.TextBoxPicaCode.Enabled = false;
            this.TextBoxPicaCode.Location = new System.Drawing.Point(103, 13);
            this.TextBoxPicaCode.Name = "TextBoxPicaCode";
            this.TextBoxPicaCode.Size = new System.Drawing.Size(135, 22);
            this.TextBoxPicaCode.TabIndex = 223;
            this.TextBoxPicaCode.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label62
            // 
            this.label62.AutoSize = true;
            this.label62.Location = new System.Drawing.Point(19, 16);
            this.label62.Name = "label62";
            this.label62.Size = new System.Drawing.Size(80, 16);
            this.label62.TabIndex = 222;
            this.label62.Text = "Pica Code";
            // 
            // TextBoxPen15Status
            // 
            this.TextBoxPen15Status.Enabled = false;
            this.TextBoxPen15Status.Location = new System.Drawing.Point(787, 429);
            this.TextBoxPen15Status.Name = "TextBoxPen15Status";
            this.TextBoxPen15Status.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen15Status.TabIndex = 221;
            this.TextBoxPen15Status.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen14Status
            // 
            this.TextBoxPen14Status.Enabled = false;
            this.TextBoxPen14Status.Location = new System.Drawing.Point(787, 403);
            this.TextBoxPen14Status.Name = "TextBoxPen14Status";
            this.TextBoxPen14Status.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen14Status.TabIndex = 220;
            this.TextBoxPen14Status.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen13Status
            // 
            this.TextBoxPen13Status.Enabled = false;
            this.TextBoxPen13Status.Location = new System.Drawing.Point(787, 377);
            this.TextBoxPen13Status.Name = "TextBoxPen13Status";
            this.TextBoxPen13Status.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen13Status.TabIndex = 219;
            this.TextBoxPen13Status.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen12Status
            // 
            this.TextBoxPen12Status.Enabled = false;
            this.TextBoxPen12Status.Location = new System.Drawing.Point(787, 351);
            this.TextBoxPen12Status.Name = "TextBoxPen12Status";
            this.TextBoxPen12Status.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen12Status.TabIndex = 218;
            this.TextBoxPen12Status.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen11Status
            // 
            this.TextBoxPen11Status.Enabled = false;
            this.TextBoxPen11Status.Location = new System.Drawing.Point(787, 325);
            this.TextBoxPen11Status.Name = "TextBoxPen11Status";
            this.TextBoxPen11Status.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen11Status.TabIndex = 217;
            this.TextBoxPen11Status.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen10Status
            // 
            this.TextBoxPen10Status.Enabled = false;
            this.TextBoxPen10Status.Location = new System.Drawing.Point(787, 299);
            this.TextBoxPen10Status.Name = "TextBoxPen10Status";
            this.TextBoxPen10Status.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen10Status.TabIndex = 216;
            this.TextBoxPen10Status.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen9Status
            // 
            this.TextBoxPen9Status.Enabled = false;
            this.TextBoxPen9Status.Location = new System.Drawing.Point(787, 273);
            this.TextBoxPen9Status.Name = "TextBoxPen9Status";
            this.TextBoxPen9Status.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen9Status.TabIndex = 215;
            this.TextBoxPen9Status.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen8Status
            // 
            this.TextBoxPen8Status.Enabled = false;
            this.TextBoxPen8Status.Location = new System.Drawing.Point(787, 247);
            this.TextBoxPen8Status.Name = "TextBoxPen8Status";
            this.TextBoxPen8Status.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen8Status.TabIndex = 214;
            this.TextBoxPen8Status.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen7Status
            // 
            this.TextBoxPen7Status.Enabled = false;
            this.TextBoxPen7Status.Location = new System.Drawing.Point(787, 221);
            this.TextBoxPen7Status.Name = "TextBoxPen7Status";
            this.TextBoxPen7Status.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen7Status.TabIndex = 213;
            this.TextBoxPen7Status.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen6Status
            // 
            this.TextBoxPen6Status.Enabled = false;
            this.TextBoxPen6Status.Location = new System.Drawing.Point(787, 195);
            this.TextBoxPen6Status.Name = "TextBoxPen6Status";
            this.TextBoxPen6Status.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen6Status.TabIndex = 212;
            this.TextBoxPen6Status.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen5Status
            // 
            this.TextBoxPen5Status.Enabled = false;
            this.TextBoxPen5Status.Location = new System.Drawing.Point(787, 169);
            this.TextBoxPen5Status.Name = "TextBoxPen5Status";
            this.TextBoxPen5Status.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen5Status.TabIndex = 211;
            this.TextBoxPen5Status.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen4Status
            // 
            this.TextBoxPen4Status.Enabled = false;
            this.TextBoxPen4Status.Location = new System.Drawing.Point(787, 143);
            this.TextBoxPen4Status.Name = "TextBoxPen4Status";
            this.TextBoxPen4Status.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen4Status.TabIndex = 210;
            this.TextBoxPen4Status.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen3Status
            // 
            this.TextBoxPen3Status.Enabled = false;
            this.TextBoxPen3Status.Location = new System.Drawing.Point(787, 118);
            this.TextBoxPen3Status.Name = "TextBoxPen3Status";
            this.TextBoxPen3Status.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen3Status.TabIndex = 209;
            this.TextBoxPen3Status.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen2Status
            // 
            this.TextBoxPen2Status.Enabled = false;
            this.TextBoxPen2Status.Location = new System.Drawing.Point(787, 92);
            this.TextBoxPen2Status.Name = "TextBoxPen2Status";
            this.TextBoxPen2Status.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen2Status.TabIndex = 208;
            this.TextBoxPen2Status.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen1Status
            // 
            this.TextBoxPen1Status.Enabled = false;
            this.TextBoxPen1Status.Location = new System.Drawing.Point(787, 66);
            this.TextBoxPen1Status.Name = "TextBoxPen1Status";
            this.TextBoxPen1Status.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen1Status.TabIndex = 207;
            this.TextBoxPen1Status.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(784, 47);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(82, 16);
            this.label2.TabIndex = 206;
            this.label2.Text = "Pen Status";
            // 
            // label77
            // 
            this.label77.AutoSize = true;
            this.label77.Location = new System.Drawing.Point(18, 432);
            this.label77.Name = "label77";
            this.label77.Size = new System.Drawing.Size(59, 16);
            this.label77.TabIndex = 205;
            this.label77.Text = "PEN 15";
            // 
            // label76
            // 
            this.label76.AutoSize = true;
            this.label76.Location = new System.Drawing.Point(18, 406);
            this.label76.Name = "label76";
            this.label76.Size = new System.Drawing.Size(59, 16);
            this.label76.TabIndex = 204;
            this.label76.Text = "PEN 14";
            // 
            // label75
            // 
            this.label75.AutoSize = true;
            this.label75.Location = new System.Drawing.Point(18, 380);
            this.label75.Name = "label75";
            this.label75.Size = new System.Drawing.Size(59, 16);
            this.label75.TabIndex = 203;
            this.label75.Text = "PEN 13";
            // 
            // label74
            // 
            this.label74.AutoSize = true;
            this.label74.Location = new System.Drawing.Point(18, 354);
            this.label74.Name = "label74";
            this.label74.Size = new System.Drawing.Size(59, 16);
            this.label74.TabIndex = 202;
            this.label74.Text = "PEN 12";
            // 
            // label73
            // 
            this.label73.AutoSize = true;
            this.label73.Location = new System.Drawing.Point(18, 328);
            this.label73.Name = "label73";
            this.label73.Size = new System.Drawing.Size(59, 16);
            this.label73.TabIndex = 201;
            this.label73.Text = "PEN 11";
            // 
            // label72
            // 
            this.label72.AutoSize = true;
            this.label72.Location = new System.Drawing.Point(18, 302);
            this.label72.Name = "label72";
            this.label72.Size = new System.Drawing.Size(59, 16);
            this.label72.TabIndex = 200;
            this.label72.Text = "PEN 10";
            // 
            // label71
            // 
            this.label71.AutoSize = true;
            this.label71.Location = new System.Drawing.Point(19, 276);
            this.label71.Name = "label71";
            this.label71.Size = new System.Drawing.Size(51, 16);
            this.label71.TabIndex = 199;
            this.label71.Text = "PEN 9";
            // 
            // label70
            // 
            this.label70.AutoSize = true;
            this.label70.Location = new System.Drawing.Point(19, 250);
            this.label70.Name = "label70";
            this.label70.Size = new System.Drawing.Size(51, 16);
            this.label70.TabIndex = 198;
            this.label70.Text = "PEN 8";
            // 
            // label69
            // 
            this.label69.AutoSize = true;
            this.label69.Location = new System.Drawing.Point(19, 224);
            this.label69.Name = "label69";
            this.label69.Size = new System.Drawing.Size(51, 16);
            this.label69.TabIndex = 197;
            this.label69.Text = "PEN 7";
            // 
            // label68
            // 
            this.label68.AutoSize = true;
            this.label68.Location = new System.Drawing.Point(19, 198);
            this.label68.Name = "label68";
            this.label68.Size = new System.Drawing.Size(51, 16);
            this.label68.TabIndex = 196;
            this.label68.Text = "PEN 6";
            // 
            // label67
            // 
            this.label67.AutoSize = true;
            this.label67.Location = new System.Drawing.Point(19, 172);
            this.label67.Name = "label67";
            this.label67.Size = new System.Drawing.Size(51, 16);
            this.label67.TabIndex = 195;
            this.label67.Text = "PEN 5";
            // 
            // label61
            // 
            this.label61.AutoSize = true;
            this.label61.Location = new System.Drawing.Point(19, 146);
            this.label61.Name = "label61";
            this.label61.Size = new System.Drawing.Size(51, 16);
            this.label61.TabIndex = 194;
            this.label61.Text = "PEN 4";
            // 
            // label60
            // 
            this.label60.AutoSize = true;
            this.label60.Location = new System.Drawing.Point(19, 121);
            this.label60.Name = "label60";
            this.label60.Size = new System.Drawing.Size(51, 16);
            this.label60.TabIndex = 193;
            this.label60.Text = "PEN 3";
            // 
            // label47
            // 
            this.label47.AutoSize = true;
            this.label47.Location = new System.Drawing.Point(19, 95);
            this.label47.Name = "label47";
            this.label47.Size = new System.Drawing.Size(51, 16);
            this.label47.TabIndex = 192;
            this.label47.Text = "PEN 2";
            // 
            // label46
            // 
            this.label46.AutoSize = true;
            this.label46.Location = new System.Drawing.Point(19, 69);
            this.label46.Name = "label46";
            this.label46.Size = new System.Drawing.Size(51, 16);
            this.label46.TabIndex = 191;
            this.label46.Text = "PEN 1";
            // 
            // TextBoxPen15CycleTime
            // 
            this.TextBoxPen15CycleTime.Enabled = false;
            this.TextBoxPen15CycleTime.Location = new System.Drawing.Point(692, 429);
            this.TextBoxPen15CycleTime.Name = "TextBoxPen15CycleTime";
            this.TextBoxPen15CycleTime.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen15CycleTime.TabIndex = 190;
            this.TextBoxPen15CycleTime.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen15Cam5
            // 
            this.TextBoxPen15Cam5.Enabled = false;
            this.TextBoxPen15Cam5.Location = new System.Drawing.Point(573, 429);
            this.TextBoxPen15Cam5.Name = "TextBoxPen15Cam5";
            this.TextBoxPen15Cam5.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen15Cam5.TabIndex = 189;
            this.TextBoxPen15Cam5.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen15Cam4
            // 
            this.TextBoxPen15Cam4.Enabled = false;
            this.TextBoxPen15Cam4.Location = new System.Drawing.Point(452, 429);
            this.TextBoxPen15Cam4.Name = "TextBoxPen15Cam4";
            this.TextBoxPen15Cam4.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen15Cam4.TabIndex = 188;
            this.TextBoxPen15Cam4.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen15Cam3
            // 
            this.TextBoxPen15Cam3.Enabled = false;
            this.TextBoxPen15Cam3.Location = new System.Drawing.Point(331, 429);
            this.TextBoxPen15Cam3.Name = "TextBoxPen15Cam3";
            this.TextBoxPen15Cam3.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen15Cam3.TabIndex = 187;
            this.TextBoxPen15Cam3.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen15Cam2
            // 
            this.TextBoxPen15Cam2.Enabled = false;
            this.TextBoxPen15Cam2.Location = new System.Drawing.Point(211, 429);
            this.TextBoxPen15Cam2.Name = "TextBoxPen15Cam2";
            this.TextBoxPen15Cam2.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen15Cam2.TabIndex = 186;
            this.TextBoxPen15Cam2.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen15Cam1
            // 
            this.TextBoxPen15Cam1.Enabled = false;
            this.TextBoxPen15Cam1.Location = new System.Drawing.Point(93, 429);
            this.TextBoxPen15Cam1.Name = "TextBoxPen15Cam1";
            this.TextBoxPen15Cam1.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen15Cam1.TabIndex = 185;
            this.TextBoxPen15Cam1.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen14CycleTime
            // 
            this.TextBoxPen14CycleTime.Enabled = false;
            this.TextBoxPen14CycleTime.Location = new System.Drawing.Point(692, 403);
            this.TextBoxPen14CycleTime.Name = "TextBoxPen14CycleTime";
            this.TextBoxPen14CycleTime.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen14CycleTime.TabIndex = 184;
            this.TextBoxPen14CycleTime.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen14Cam5
            // 
            this.TextBoxPen14Cam5.Enabled = false;
            this.TextBoxPen14Cam5.Location = new System.Drawing.Point(573, 403);
            this.TextBoxPen14Cam5.Name = "TextBoxPen14Cam5";
            this.TextBoxPen14Cam5.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen14Cam5.TabIndex = 183;
            this.TextBoxPen14Cam5.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen14Cam4
            // 
            this.TextBoxPen14Cam4.Enabled = false;
            this.TextBoxPen14Cam4.Location = new System.Drawing.Point(452, 403);
            this.TextBoxPen14Cam4.Name = "TextBoxPen14Cam4";
            this.TextBoxPen14Cam4.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen14Cam4.TabIndex = 182;
            this.TextBoxPen14Cam4.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen14Cam3
            // 
            this.TextBoxPen14Cam3.Enabled = false;
            this.TextBoxPen14Cam3.Location = new System.Drawing.Point(331, 403);
            this.TextBoxPen14Cam3.Name = "TextBoxPen14Cam3";
            this.TextBoxPen14Cam3.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen14Cam3.TabIndex = 181;
            this.TextBoxPen14Cam3.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen14Cam2
            // 
            this.TextBoxPen14Cam2.Enabled = false;
            this.TextBoxPen14Cam2.Location = new System.Drawing.Point(211, 403);
            this.TextBoxPen14Cam2.Name = "TextBoxPen14Cam2";
            this.TextBoxPen14Cam2.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen14Cam2.TabIndex = 180;
            this.TextBoxPen14Cam2.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen14Cam1
            // 
            this.TextBoxPen14Cam1.Enabled = false;
            this.TextBoxPen14Cam1.Location = new System.Drawing.Point(93, 403);
            this.TextBoxPen14Cam1.Name = "TextBoxPen14Cam1";
            this.TextBoxPen14Cam1.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen14Cam1.TabIndex = 179;
            this.TextBoxPen14Cam1.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen13CycleTime
            // 
            this.TextBoxPen13CycleTime.Enabled = false;
            this.TextBoxPen13CycleTime.Location = new System.Drawing.Point(692, 377);
            this.TextBoxPen13CycleTime.Name = "TextBoxPen13CycleTime";
            this.TextBoxPen13CycleTime.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen13CycleTime.TabIndex = 178;
            this.TextBoxPen13CycleTime.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen13Cam5
            // 
            this.TextBoxPen13Cam5.Enabled = false;
            this.TextBoxPen13Cam5.Location = new System.Drawing.Point(573, 377);
            this.TextBoxPen13Cam5.Name = "TextBoxPen13Cam5";
            this.TextBoxPen13Cam5.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen13Cam5.TabIndex = 177;
            this.TextBoxPen13Cam5.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen13Cam4
            // 
            this.TextBoxPen13Cam4.Enabled = false;
            this.TextBoxPen13Cam4.Location = new System.Drawing.Point(452, 377);
            this.TextBoxPen13Cam4.Name = "TextBoxPen13Cam4";
            this.TextBoxPen13Cam4.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen13Cam4.TabIndex = 176;
            this.TextBoxPen13Cam4.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen13Cam3
            // 
            this.TextBoxPen13Cam3.Enabled = false;
            this.TextBoxPen13Cam3.Location = new System.Drawing.Point(331, 377);
            this.TextBoxPen13Cam3.Name = "TextBoxPen13Cam3";
            this.TextBoxPen13Cam3.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen13Cam3.TabIndex = 175;
            this.TextBoxPen13Cam3.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen13Cam2
            // 
            this.TextBoxPen13Cam2.Enabled = false;
            this.TextBoxPen13Cam2.Location = new System.Drawing.Point(211, 377);
            this.TextBoxPen13Cam2.Name = "TextBoxPen13Cam2";
            this.TextBoxPen13Cam2.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen13Cam2.TabIndex = 174;
            this.TextBoxPen13Cam2.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen13Cam1
            // 
            this.TextBoxPen13Cam1.Enabled = false;
            this.TextBoxPen13Cam1.Location = new System.Drawing.Point(93, 377);
            this.TextBoxPen13Cam1.Name = "TextBoxPen13Cam1";
            this.TextBoxPen13Cam1.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen13Cam1.TabIndex = 173;
            this.TextBoxPen13Cam1.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen12CycleTime
            // 
            this.TextBoxPen12CycleTime.Enabled = false;
            this.TextBoxPen12CycleTime.Location = new System.Drawing.Point(692, 351);
            this.TextBoxPen12CycleTime.Name = "TextBoxPen12CycleTime";
            this.TextBoxPen12CycleTime.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen12CycleTime.TabIndex = 172;
            this.TextBoxPen12CycleTime.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen12Cam5
            // 
            this.TextBoxPen12Cam5.Enabled = false;
            this.TextBoxPen12Cam5.Location = new System.Drawing.Point(573, 351);
            this.TextBoxPen12Cam5.Name = "TextBoxPen12Cam5";
            this.TextBoxPen12Cam5.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen12Cam5.TabIndex = 171;
            this.TextBoxPen12Cam5.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen12Cam4
            // 
            this.TextBoxPen12Cam4.Enabled = false;
            this.TextBoxPen12Cam4.Location = new System.Drawing.Point(452, 351);
            this.TextBoxPen12Cam4.Name = "TextBoxPen12Cam4";
            this.TextBoxPen12Cam4.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen12Cam4.TabIndex = 170;
            this.TextBoxPen12Cam4.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen12Cam3
            // 
            this.TextBoxPen12Cam3.Enabled = false;
            this.TextBoxPen12Cam3.Location = new System.Drawing.Point(331, 351);
            this.TextBoxPen12Cam3.Name = "TextBoxPen12Cam3";
            this.TextBoxPen12Cam3.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen12Cam3.TabIndex = 169;
            this.TextBoxPen12Cam3.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen12Cam2
            // 
            this.TextBoxPen12Cam2.Enabled = false;
            this.TextBoxPen12Cam2.Location = new System.Drawing.Point(211, 351);
            this.TextBoxPen12Cam2.Name = "TextBoxPen12Cam2";
            this.TextBoxPen12Cam2.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen12Cam2.TabIndex = 168;
            this.TextBoxPen12Cam2.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen12Cam1
            // 
            this.TextBoxPen12Cam1.Enabled = false;
            this.TextBoxPen12Cam1.Location = new System.Drawing.Point(93, 351);
            this.TextBoxPen12Cam1.Name = "TextBoxPen12Cam1";
            this.TextBoxPen12Cam1.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen12Cam1.TabIndex = 167;
            this.TextBoxPen12Cam1.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen11CycleTime
            // 
            this.TextBoxPen11CycleTime.Enabled = false;
            this.TextBoxPen11CycleTime.Location = new System.Drawing.Point(692, 325);
            this.TextBoxPen11CycleTime.Name = "TextBoxPen11CycleTime";
            this.TextBoxPen11CycleTime.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen11CycleTime.TabIndex = 166;
            this.TextBoxPen11CycleTime.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen11Cam5
            // 
            this.TextBoxPen11Cam5.Enabled = false;
            this.TextBoxPen11Cam5.Location = new System.Drawing.Point(573, 325);
            this.TextBoxPen11Cam5.Name = "TextBoxPen11Cam5";
            this.TextBoxPen11Cam5.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen11Cam5.TabIndex = 165;
            this.TextBoxPen11Cam5.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen11Cam4
            // 
            this.TextBoxPen11Cam4.Enabled = false;
            this.TextBoxPen11Cam4.Location = new System.Drawing.Point(452, 325);
            this.TextBoxPen11Cam4.Name = "TextBoxPen11Cam4";
            this.TextBoxPen11Cam4.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen11Cam4.TabIndex = 164;
            this.TextBoxPen11Cam4.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen11Cam3
            // 
            this.TextBoxPen11Cam3.Enabled = false;
            this.TextBoxPen11Cam3.Location = new System.Drawing.Point(331, 325);
            this.TextBoxPen11Cam3.Name = "TextBoxPen11Cam3";
            this.TextBoxPen11Cam3.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen11Cam3.TabIndex = 163;
            this.TextBoxPen11Cam3.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen11Cam2
            // 
            this.TextBoxPen11Cam2.Enabled = false;
            this.TextBoxPen11Cam2.Location = new System.Drawing.Point(211, 325);
            this.TextBoxPen11Cam2.Name = "TextBoxPen11Cam2";
            this.TextBoxPen11Cam2.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen11Cam2.TabIndex = 162;
            this.TextBoxPen11Cam2.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen11Cam1
            // 
            this.TextBoxPen11Cam1.Enabled = false;
            this.TextBoxPen11Cam1.Location = new System.Drawing.Point(93, 325);
            this.TextBoxPen11Cam1.Name = "TextBoxPen11Cam1";
            this.TextBoxPen11Cam1.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen11Cam1.TabIndex = 161;
            this.TextBoxPen11Cam1.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen10CycleTime
            // 
            this.TextBoxPen10CycleTime.Enabled = false;
            this.TextBoxPen10CycleTime.Location = new System.Drawing.Point(692, 299);
            this.TextBoxPen10CycleTime.Name = "TextBoxPen10CycleTime";
            this.TextBoxPen10CycleTime.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen10CycleTime.TabIndex = 160;
            this.TextBoxPen10CycleTime.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen10Cam5
            // 
            this.TextBoxPen10Cam5.Enabled = false;
            this.TextBoxPen10Cam5.Location = new System.Drawing.Point(573, 299);
            this.TextBoxPen10Cam5.Name = "TextBoxPen10Cam5";
            this.TextBoxPen10Cam5.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen10Cam5.TabIndex = 159;
            this.TextBoxPen10Cam5.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen10Cam4
            // 
            this.TextBoxPen10Cam4.Enabled = false;
            this.TextBoxPen10Cam4.Location = new System.Drawing.Point(452, 299);
            this.TextBoxPen10Cam4.Name = "TextBoxPen10Cam4";
            this.TextBoxPen10Cam4.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen10Cam4.TabIndex = 158;
            this.TextBoxPen10Cam4.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen10Cam3
            // 
            this.TextBoxPen10Cam3.Enabled = false;
            this.TextBoxPen10Cam3.Location = new System.Drawing.Point(331, 299);
            this.TextBoxPen10Cam3.Name = "TextBoxPen10Cam3";
            this.TextBoxPen10Cam3.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen10Cam3.TabIndex = 157;
            this.TextBoxPen10Cam3.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen10Cam2
            // 
            this.TextBoxPen10Cam2.Enabled = false;
            this.TextBoxPen10Cam2.Location = new System.Drawing.Point(211, 299);
            this.TextBoxPen10Cam2.Name = "TextBoxPen10Cam2";
            this.TextBoxPen10Cam2.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen10Cam2.TabIndex = 156;
            this.TextBoxPen10Cam2.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen10Cam1
            // 
            this.TextBoxPen10Cam1.Enabled = false;
            this.TextBoxPen10Cam1.Location = new System.Drawing.Point(93, 299);
            this.TextBoxPen10Cam1.Name = "TextBoxPen10Cam1";
            this.TextBoxPen10Cam1.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen10Cam1.TabIndex = 155;
            this.TextBoxPen10Cam1.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen9CycleTime
            // 
            this.TextBoxPen9CycleTime.Enabled = false;
            this.TextBoxPen9CycleTime.Location = new System.Drawing.Point(692, 273);
            this.TextBoxPen9CycleTime.Name = "TextBoxPen9CycleTime";
            this.TextBoxPen9CycleTime.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen9CycleTime.TabIndex = 154;
            this.TextBoxPen9CycleTime.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen9Cam5
            // 
            this.TextBoxPen9Cam5.Enabled = false;
            this.TextBoxPen9Cam5.Location = new System.Drawing.Point(573, 273);
            this.TextBoxPen9Cam5.Name = "TextBoxPen9Cam5";
            this.TextBoxPen9Cam5.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen9Cam5.TabIndex = 153;
            this.TextBoxPen9Cam5.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen9Cam4
            // 
            this.TextBoxPen9Cam4.Enabled = false;
            this.TextBoxPen9Cam4.Location = new System.Drawing.Point(452, 273);
            this.TextBoxPen9Cam4.Name = "TextBoxPen9Cam4";
            this.TextBoxPen9Cam4.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen9Cam4.TabIndex = 152;
            this.TextBoxPen9Cam4.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen9Cam3
            // 
            this.TextBoxPen9Cam3.Enabled = false;
            this.TextBoxPen9Cam3.Location = new System.Drawing.Point(331, 273);
            this.TextBoxPen9Cam3.Name = "TextBoxPen9Cam3";
            this.TextBoxPen9Cam3.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen9Cam3.TabIndex = 151;
            this.TextBoxPen9Cam3.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen9Cam2
            // 
            this.TextBoxPen9Cam2.Enabled = false;
            this.TextBoxPen9Cam2.Location = new System.Drawing.Point(211, 273);
            this.TextBoxPen9Cam2.Name = "TextBoxPen9Cam2";
            this.TextBoxPen9Cam2.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen9Cam2.TabIndex = 150;
            this.TextBoxPen9Cam2.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen9Cam1
            // 
            this.TextBoxPen9Cam1.Enabled = false;
            this.TextBoxPen9Cam1.Location = new System.Drawing.Point(93, 273);
            this.TextBoxPen9Cam1.Name = "TextBoxPen9Cam1";
            this.TextBoxPen9Cam1.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen9Cam1.TabIndex = 149;
            this.TextBoxPen9Cam1.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen8CycleTime
            // 
            this.TextBoxPen8CycleTime.Enabled = false;
            this.TextBoxPen8CycleTime.Location = new System.Drawing.Point(692, 247);
            this.TextBoxPen8CycleTime.Name = "TextBoxPen8CycleTime";
            this.TextBoxPen8CycleTime.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen8CycleTime.TabIndex = 148;
            this.TextBoxPen8CycleTime.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen8Cam5
            // 
            this.TextBoxPen8Cam5.Enabled = false;
            this.TextBoxPen8Cam5.Location = new System.Drawing.Point(573, 247);
            this.TextBoxPen8Cam5.Name = "TextBoxPen8Cam5";
            this.TextBoxPen8Cam5.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen8Cam5.TabIndex = 147;
            this.TextBoxPen8Cam5.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen8Cam4
            // 
            this.TextBoxPen8Cam4.Enabled = false;
            this.TextBoxPen8Cam4.Location = new System.Drawing.Point(452, 247);
            this.TextBoxPen8Cam4.Name = "TextBoxPen8Cam4";
            this.TextBoxPen8Cam4.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen8Cam4.TabIndex = 146;
            this.TextBoxPen8Cam4.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen8Cam3
            // 
            this.TextBoxPen8Cam3.Enabled = false;
            this.TextBoxPen8Cam3.Location = new System.Drawing.Point(331, 247);
            this.TextBoxPen8Cam3.Name = "TextBoxPen8Cam3";
            this.TextBoxPen8Cam3.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen8Cam3.TabIndex = 145;
            this.TextBoxPen8Cam3.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen8Cam2
            // 
            this.TextBoxPen8Cam2.Enabled = false;
            this.TextBoxPen8Cam2.Location = new System.Drawing.Point(211, 247);
            this.TextBoxPen8Cam2.Name = "TextBoxPen8Cam2";
            this.TextBoxPen8Cam2.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen8Cam2.TabIndex = 144;
            this.TextBoxPen8Cam2.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen8Cam1
            // 
            this.TextBoxPen8Cam1.Enabled = false;
            this.TextBoxPen8Cam1.Location = new System.Drawing.Point(93, 247);
            this.TextBoxPen8Cam1.Name = "TextBoxPen8Cam1";
            this.TextBoxPen8Cam1.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen8Cam1.TabIndex = 143;
            this.TextBoxPen8Cam1.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen7CycleTime
            // 
            this.TextBoxPen7CycleTime.Enabled = false;
            this.TextBoxPen7CycleTime.Location = new System.Drawing.Point(692, 221);
            this.TextBoxPen7CycleTime.Name = "TextBoxPen7CycleTime";
            this.TextBoxPen7CycleTime.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen7CycleTime.TabIndex = 142;
            this.TextBoxPen7CycleTime.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen7Cam5
            // 
            this.TextBoxPen7Cam5.Enabled = false;
            this.TextBoxPen7Cam5.Location = new System.Drawing.Point(573, 221);
            this.TextBoxPen7Cam5.Name = "TextBoxPen7Cam5";
            this.TextBoxPen7Cam5.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen7Cam5.TabIndex = 141;
            this.TextBoxPen7Cam5.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen7Cam4
            // 
            this.TextBoxPen7Cam4.Enabled = false;
            this.TextBoxPen7Cam4.Location = new System.Drawing.Point(452, 221);
            this.TextBoxPen7Cam4.Name = "TextBoxPen7Cam4";
            this.TextBoxPen7Cam4.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen7Cam4.TabIndex = 140;
            this.TextBoxPen7Cam4.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen7Cam3
            // 
            this.TextBoxPen7Cam3.Enabled = false;
            this.TextBoxPen7Cam3.Location = new System.Drawing.Point(331, 221);
            this.TextBoxPen7Cam3.Name = "TextBoxPen7Cam3";
            this.TextBoxPen7Cam3.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen7Cam3.TabIndex = 139;
            this.TextBoxPen7Cam3.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen7Cam2
            // 
            this.TextBoxPen7Cam2.Enabled = false;
            this.TextBoxPen7Cam2.Location = new System.Drawing.Point(211, 221);
            this.TextBoxPen7Cam2.Name = "TextBoxPen7Cam2";
            this.TextBoxPen7Cam2.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen7Cam2.TabIndex = 138;
            this.TextBoxPen7Cam2.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen7Cam1
            // 
            this.TextBoxPen7Cam1.Enabled = false;
            this.TextBoxPen7Cam1.Location = new System.Drawing.Point(93, 221);
            this.TextBoxPen7Cam1.Name = "TextBoxPen7Cam1";
            this.TextBoxPen7Cam1.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen7Cam1.TabIndex = 137;
            this.TextBoxPen7Cam1.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen6CycleTime
            // 
            this.TextBoxPen6CycleTime.Enabled = false;
            this.TextBoxPen6CycleTime.Location = new System.Drawing.Point(692, 195);
            this.TextBoxPen6CycleTime.Name = "TextBoxPen6CycleTime";
            this.TextBoxPen6CycleTime.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen6CycleTime.TabIndex = 136;
            this.TextBoxPen6CycleTime.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen6Cam5
            // 
            this.TextBoxPen6Cam5.Enabled = false;
            this.TextBoxPen6Cam5.Location = new System.Drawing.Point(573, 195);
            this.TextBoxPen6Cam5.Name = "TextBoxPen6Cam5";
            this.TextBoxPen6Cam5.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen6Cam5.TabIndex = 135;
            this.TextBoxPen6Cam5.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen6Cam4
            // 
            this.TextBoxPen6Cam4.Enabled = false;
            this.TextBoxPen6Cam4.Location = new System.Drawing.Point(452, 195);
            this.TextBoxPen6Cam4.Name = "TextBoxPen6Cam4";
            this.TextBoxPen6Cam4.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen6Cam4.TabIndex = 134;
            this.TextBoxPen6Cam4.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen6Cam3
            // 
            this.TextBoxPen6Cam3.Enabled = false;
            this.TextBoxPen6Cam3.Location = new System.Drawing.Point(331, 195);
            this.TextBoxPen6Cam3.Name = "TextBoxPen6Cam3";
            this.TextBoxPen6Cam3.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen6Cam3.TabIndex = 133;
            this.TextBoxPen6Cam3.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen6Cam2
            // 
            this.TextBoxPen6Cam2.Enabled = false;
            this.TextBoxPen6Cam2.Location = new System.Drawing.Point(211, 195);
            this.TextBoxPen6Cam2.Name = "TextBoxPen6Cam2";
            this.TextBoxPen6Cam2.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen6Cam2.TabIndex = 132;
            this.TextBoxPen6Cam2.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen6Cam1
            // 
            this.TextBoxPen6Cam1.Enabled = false;
            this.TextBoxPen6Cam1.Location = new System.Drawing.Point(93, 195);
            this.TextBoxPen6Cam1.Name = "TextBoxPen6Cam1";
            this.TextBoxPen6Cam1.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen6Cam1.TabIndex = 131;
            this.TextBoxPen6Cam1.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen5CycleTime
            // 
            this.TextBoxPen5CycleTime.Enabled = false;
            this.TextBoxPen5CycleTime.Location = new System.Drawing.Point(692, 169);
            this.TextBoxPen5CycleTime.Name = "TextBoxPen5CycleTime";
            this.TextBoxPen5CycleTime.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen5CycleTime.TabIndex = 130;
            this.TextBoxPen5CycleTime.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen5Cam5
            // 
            this.TextBoxPen5Cam5.Enabled = false;
            this.TextBoxPen5Cam5.Location = new System.Drawing.Point(573, 169);
            this.TextBoxPen5Cam5.Name = "TextBoxPen5Cam5";
            this.TextBoxPen5Cam5.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen5Cam5.TabIndex = 129;
            this.TextBoxPen5Cam5.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen5Cam4
            // 
            this.TextBoxPen5Cam4.Enabled = false;
            this.TextBoxPen5Cam4.Location = new System.Drawing.Point(452, 169);
            this.TextBoxPen5Cam4.Name = "TextBoxPen5Cam4";
            this.TextBoxPen5Cam4.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen5Cam4.TabIndex = 128;
            this.TextBoxPen5Cam4.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen5Cam3
            // 
            this.TextBoxPen5Cam3.Enabled = false;
            this.TextBoxPen5Cam3.Location = new System.Drawing.Point(331, 169);
            this.TextBoxPen5Cam3.Name = "TextBoxPen5Cam3";
            this.TextBoxPen5Cam3.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen5Cam3.TabIndex = 127;
            this.TextBoxPen5Cam3.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen5Cam2
            // 
            this.TextBoxPen5Cam2.Enabled = false;
            this.TextBoxPen5Cam2.Location = new System.Drawing.Point(211, 169);
            this.TextBoxPen5Cam2.Name = "TextBoxPen5Cam2";
            this.TextBoxPen5Cam2.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen5Cam2.TabIndex = 126;
            this.TextBoxPen5Cam2.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen5Cam1
            // 
            this.TextBoxPen5Cam1.Enabled = false;
            this.TextBoxPen5Cam1.Location = new System.Drawing.Point(93, 169);
            this.TextBoxPen5Cam1.Name = "TextBoxPen5Cam1";
            this.TextBoxPen5Cam1.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen5Cam1.TabIndex = 125;
            this.TextBoxPen5Cam1.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen4CycleTime
            // 
            this.TextBoxPen4CycleTime.Enabled = false;
            this.TextBoxPen4CycleTime.Location = new System.Drawing.Point(692, 143);
            this.TextBoxPen4CycleTime.Name = "TextBoxPen4CycleTime";
            this.TextBoxPen4CycleTime.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen4CycleTime.TabIndex = 124;
            this.TextBoxPen4CycleTime.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen4Cam5
            // 
            this.TextBoxPen4Cam5.Enabled = false;
            this.TextBoxPen4Cam5.Location = new System.Drawing.Point(573, 143);
            this.TextBoxPen4Cam5.Name = "TextBoxPen4Cam5";
            this.TextBoxPen4Cam5.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen4Cam5.TabIndex = 123;
            this.TextBoxPen4Cam5.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen4Cam4
            // 
            this.TextBoxPen4Cam4.Enabled = false;
            this.TextBoxPen4Cam4.Location = new System.Drawing.Point(452, 143);
            this.TextBoxPen4Cam4.Name = "TextBoxPen4Cam4";
            this.TextBoxPen4Cam4.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen4Cam4.TabIndex = 122;
            this.TextBoxPen4Cam4.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen4Cam3
            // 
            this.TextBoxPen4Cam3.Enabled = false;
            this.TextBoxPen4Cam3.Location = new System.Drawing.Point(331, 143);
            this.TextBoxPen4Cam3.Name = "TextBoxPen4Cam3";
            this.TextBoxPen4Cam3.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen4Cam3.TabIndex = 121;
            this.TextBoxPen4Cam3.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen4Cam2
            // 
            this.TextBoxPen4Cam2.Enabled = false;
            this.TextBoxPen4Cam2.Location = new System.Drawing.Point(211, 143);
            this.TextBoxPen4Cam2.Name = "TextBoxPen4Cam2";
            this.TextBoxPen4Cam2.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen4Cam2.TabIndex = 120;
            this.TextBoxPen4Cam2.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen4Cam1
            // 
            this.TextBoxPen4Cam1.Enabled = false;
            this.TextBoxPen4Cam1.Location = new System.Drawing.Point(93, 143);
            this.TextBoxPen4Cam1.Name = "TextBoxPen4Cam1";
            this.TextBoxPen4Cam1.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen4Cam1.TabIndex = 119;
            this.TextBoxPen4Cam1.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen3CycleTime
            // 
            this.TextBoxPen3CycleTime.Enabled = false;
            this.TextBoxPen3CycleTime.Location = new System.Drawing.Point(692, 118);
            this.TextBoxPen3CycleTime.Name = "TextBoxPen3CycleTime";
            this.TextBoxPen3CycleTime.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen3CycleTime.TabIndex = 118;
            this.TextBoxPen3CycleTime.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen3Cam5
            // 
            this.TextBoxPen3Cam5.Enabled = false;
            this.TextBoxPen3Cam5.Location = new System.Drawing.Point(573, 118);
            this.TextBoxPen3Cam5.Name = "TextBoxPen3Cam5";
            this.TextBoxPen3Cam5.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen3Cam5.TabIndex = 117;
            this.TextBoxPen3Cam5.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen3Cam4
            // 
            this.TextBoxPen3Cam4.Enabled = false;
            this.TextBoxPen3Cam4.Location = new System.Drawing.Point(452, 118);
            this.TextBoxPen3Cam4.Name = "TextBoxPen3Cam4";
            this.TextBoxPen3Cam4.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen3Cam4.TabIndex = 116;
            this.TextBoxPen3Cam4.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen3Cam3
            // 
            this.TextBoxPen3Cam3.Enabled = false;
            this.TextBoxPen3Cam3.Location = new System.Drawing.Point(331, 118);
            this.TextBoxPen3Cam3.Name = "TextBoxPen3Cam3";
            this.TextBoxPen3Cam3.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen3Cam3.TabIndex = 115;
            this.TextBoxPen3Cam3.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen3Cam2
            // 
            this.TextBoxPen3Cam2.Enabled = false;
            this.TextBoxPen3Cam2.Location = new System.Drawing.Point(211, 118);
            this.TextBoxPen3Cam2.Name = "TextBoxPen3Cam2";
            this.TextBoxPen3Cam2.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen3Cam2.TabIndex = 114;
            this.TextBoxPen3Cam2.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen3Cam1
            // 
            this.TextBoxPen3Cam1.Enabled = false;
            this.TextBoxPen3Cam1.Location = new System.Drawing.Point(93, 118);
            this.TextBoxPen3Cam1.Name = "TextBoxPen3Cam1";
            this.TextBoxPen3Cam1.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen3Cam1.TabIndex = 113;
            this.TextBoxPen3Cam1.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen2CycleTime
            // 
            this.TextBoxPen2CycleTime.Enabled = false;
            this.TextBoxPen2CycleTime.Location = new System.Drawing.Point(692, 92);
            this.TextBoxPen2CycleTime.Name = "TextBoxPen2CycleTime";
            this.TextBoxPen2CycleTime.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen2CycleTime.TabIndex = 112;
            this.TextBoxPen2CycleTime.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen2Cam5
            // 
            this.TextBoxPen2Cam5.Enabled = false;
            this.TextBoxPen2Cam5.Location = new System.Drawing.Point(573, 92);
            this.TextBoxPen2Cam5.Name = "TextBoxPen2Cam5";
            this.TextBoxPen2Cam5.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen2Cam5.TabIndex = 111;
            this.TextBoxPen2Cam5.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen2Cam4
            // 
            this.TextBoxPen2Cam4.Enabled = false;
            this.TextBoxPen2Cam4.Location = new System.Drawing.Point(452, 92);
            this.TextBoxPen2Cam4.Name = "TextBoxPen2Cam4";
            this.TextBoxPen2Cam4.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen2Cam4.TabIndex = 110;
            this.TextBoxPen2Cam4.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen2Cam3
            // 
            this.TextBoxPen2Cam3.Enabled = false;
            this.TextBoxPen2Cam3.Location = new System.Drawing.Point(331, 92);
            this.TextBoxPen2Cam3.Name = "TextBoxPen2Cam3";
            this.TextBoxPen2Cam3.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen2Cam3.TabIndex = 109;
            this.TextBoxPen2Cam3.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen2Cam2
            // 
            this.TextBoxPen2Cam2.Enabled = false;
            this.TextBoxPen2Cam2.Location = new System.Drawing.Point(211, 92);
            this.TextBoxPen2Cam2.Name = "TextBoxPen2Cam2";
            this.TextBoxPen2Cam2.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen2Cam2.TabIndex = 108;
            this.TextBoxPen2Cam2.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxPen2Cam1
            // 
            this.TextBoxPen2Cam1.Enabled = false;
            this.TextBoxPen2Cam1.Location = new System.Drawing.Point(93, 92);
            this.TextBoxPen2Cam1.Name = "TextBoxPen2Cam1";
            this.TextBoxPen2Cam1.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen2Cam1.TabIndex = 107;
            this.TextBoxPen2Cam1.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // TextBoxLocation
            // 
            this.TextBoxLocation.Enabled = false;
            this.TextBoxLocation.Location = new System.Drawing.Point(830, 13);
            this.TextBoxLocation.Name = "TextBoxLocation";
            this.TextBoxLocation.Size = new System.Drawing.Size(36, 22);
            this.TextBoxLocation.TabIndex = 106;
            this.TextBoxLocation.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label40
            // 
            this.label40.AutoSize = true;
            this.label40.Location = new System.Drawing.Point(758, 16);
            this.label40.Name = "label40";
            this.label40.Size = new System.Drawing.Size(67, 16);
            this.label40.TabIndex = 105;
            this.label40.Text = "Location";
            // 
            // TextBoxPenID
            // 
            this.TextBoxPenID.Enabled = false;
            this.TextBoxPenID.Location = new System.Drawing.Point(331, 13);
            this.TextBoxPenID.Name = "TextBoxPenID";
            this.TextBoxPenID.Size = new System.Drawing.Size(144, 22);
            this.TextBoxPenID.TabIndex = 104;
            this.TextBoxPenID.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label41
            // 
            this.label41.AutoSize = true;
            this.label41.Location = new System.Drawing.Point(270, 16);
            this.label41.Name = "label41";
            this.label41.Size = new System.Drawing.Size(54, 16);
            this.label41.TabIndex = 103;
            this.label41.Text = "Pen ID";
            // 
            // TextBoxPen1CycleTime
            // 
            this.TextBoxPen1CycleTime.Enabled = false;
            this.TextBoxPen1CycleTime.Location = new System.Drawing.Point(692, 66);
            this.TextBoxPen1CycleTime.Name = "TextBoxPen1CycleTime";
            this.TextBoxPen1CycleTime.Size = new System.Drawing.Size(77, 22);
            this.TextBoxPen1CycleTime.TabIndex = 102;
            this.TextBoxPen1CycleTime.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label49
            // 
            this.label49.AutoSize = true;
            this.label49.Location = new System.Drawing.Point(689, 47);
            this.label49.Name = "label49";
            this.label49.Size = new System.Drawing.Size(86, 16);
            this.label49.TabIndex = 101;
            this.label49.Text = "Cycle Time";
            // 
            // TextBoxPen1Cam5
            // 
            this.TextBoxPen1Cam5.Enabled = false;
            this.TextBoxPen1Cam5.Location = new System.Drawing.Point(573, 66);
            this.TextBoxPen1Cam5.Name = "TextBoxPen1Cam5";
            this.TextBoxPen1Cam5.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen1Cam5.TabIndex = 96;
            this.TextBoxPen1Cam5.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label48
            // 
            this.label48.AutoSize = true;
            this.label48.Location = new System.Drawing.Point(597, 47);
            this.label48.Name = "label48";
            this.label48.Size = new System.Drawing.Size(52, 16);
            this.label48.TabIndex = 95;
            this.label48.Text = "CAM 5";
            // 
            // TextBoxPen1Cam4
            // 
            this.TextBoxPen1Cam4.Enabled = false;
            this.TextBoxPen1Cam4.Location = new System.Drawing.Point(452, 66);
            this.TextBoxPen1Cam4.Name = "TextBoxPen1Cam4";
            this.TextBoxPen1Cam4.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen1Cam4.TabIndex = 94;
            this.TextBoxPen1Cam4.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label44
            // 
            this.label44.AutoSize = true;
            this.label44.Location = new System.Drawing.Point(479, 47);
            this.label44.Name = "label44";
            this.label44.Size = new System.Drawing.Size(52, 16);
            this.label44.TabIndex = 93;
            this.label44.Text = "CAM 4";
            // 
            // TextBoxPen1Cam3
            // 
            this.TextBoxPen1Cam3.Enabled = false;
            this.TextBoxPen1Cam3.Location = new System.Drawing.Point(331, 66);
            this.TextBoxPen1Cam3.Name = "TextBoxPen1Cam3";
            this.TextBoxPen1Cam3.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen1Cam3.TabIndex = 92;
            this.TextBoxPen1Cam3.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label45
            // 
            this.label45.AutoSize = true;
            this.label45.Location = new System.Drawing.Point(351, 47);
            this.label45.Name = "label45";
            this.label45.Size = new System.Drawing.Size(52, 16);
            this.label45.TabIndex = 91;
            this.label45.Text = "CAM 3";
            // 
            // TextBoxPen1Cam2
            // 
            this.TextBoxPen1Cam2.Enabled = false;
            this.TextBoxPen1Cam2.Location = new System.Drawing.Point(211, 66);
            this.TextBoxPen1Cam2.Name = "TextBoxPen1Cam2";
            this.TextBoxPen1Cam2.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen1Cam2.TabIndex = 90;
            this.TextBoxPen1Cam2.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label43
            // 
            this.label43.AutoSize = true;
            this.label43.Location = new System.Drawing.Point(233, 47);
            this.label43.Name = "label43";
            this.label43.Size = new System.Drawing.Size(52, 16);
            this.label43.TabIndex = 89;
            this.label43.Text = "CAM 2";
            // 
            // TextBoxPen1Cam1
            // 
            this.TextBoxPen1Cam1.Enabled = false;
            this.TextBoxPen1Cam1.Location = new System.Drawing.Point(93, 66);
            this.TextBoxPen1Cam1.Name = "TextBoxPen1Cam1";
            this.TextBoxPen1Cam1.Size = new System.Drawing.Size(100, 22);
            this.TextBoxPen1Cam1.TabIndex = 88;
            this.TextBoxPen1Cam1.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label42
            // 
            this.label42.AutoSize = true;
            this.label42.Location = new System.Drawing.Point(114, 47);
            this.label42.Name = "label42";
            this.label42.Size = new System.Drawing.Size(52, 16);
            this.label42.TabIndex = 87;
            this.label42.Text = "CAM 1";
            // 
            // Tab6
            // 
            this.Tab6.Controls.Add(this.groupBox7);
            this.Tab6.Controls.Add(this.groupBox6);
            this.Tab6.Location = new System.Drawing.Point(4, 25);
            this.Tab6.Name = "Tab6";
            this.Tab6.Padding = new System.Windows.Forms.Padding(3);
            this.Tab6.Size = new System.Drawing.Size(887, 457);
            this.Tab6.TabIndex = 6;
            this.Tab6.Text = "Alarm ";
            this.Tab6.UseVisualStyleBackColor = true;
            // 
            // groupBox7
            // 
            this.groupBox7.Controls.Add(this.ListBoxRobotAlarm);
            this.groupBox7.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.groupBox7.Location = new System.Drawing.Point(6, 244);
            this.groupBox7.Name = "groupBox7";
            this.groupBox7.Size = new System.Drawing.Size(875, 203);
            this.groupBox7.TabIndex = 59;
            this.groupBox7.TabStop = false;
            this.groupBox7.Text = "- Robot Alarm -";
            // 
            // ListBoxRobotAlarm
            // 
            this.ListBoxRobotAlarm.FormattingEnabled = true;
            this.ListBoxRobotAlarm.ItemHeight = 16;
            this.ListBoxRobotAlarm.Location = new System.Drawing.Point(6, 17);
            this.ListBoxRobotAlarm.Name = "ListBoxRobotAlarm";
            this.ListBoxRobotAlarm.Size = new System.Drawing.Size(863, 180);
            this.ListBoxRobotAlarm.TabIndex = 57;
            // 
            // groupBox6
            // 
            this.groupBox6.Controls.Add(this.ListBoxMachineAlarm);
            this.groupBox6.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.groupBox6.Location = new System.Drawing.Point(6, 6);
            this.groupBox6.Name = "groupBox6";
            this.groupBox6.Size = new System.Drawing.Size(875, 232);
            this.groupBox6.TabIndex = 58;
            this.groupBox6.TabStop = false;
            this.groupBox6.Text = "- Machine Alarm -";
            // 
            // ListBoxMachineAlarm
            // 
            this.ListBoxMachineAlarm.FormattingEnabled = true;
            this.ListBoxMachineAlarm.ItemHeight = 16;
            this.ListBoxMachineAlarm.Location = new System.Drawing.Point(6, 21);
            this.ListBoxMachineAlarm.Name = "ListBoxMachineAlarm";
            this.ListBoxMachineAlarm.Size = new System.Drawing.Size(863, 196);
            this.ListBoxMachineAlarm.TabIndex = 53;
            // 
            // NotifyIcon
            // 
            this.NotifyIcon.Icon = ((System.Drawing.Icon)(resources.GetObject("NotifyIcon.Icon")));
            this.NotifyIcon.Text = "Elliance @ HP Lab";
            this.NotifyIcon.MouseClick += new System.Windows.Forms.MouseEventHandler(this.NotifyIcon_MouseClick);
            this.NotifyIcon.MouseDoubleClick += new System.Windows.Forms.MouseEventHandler(this.NotifyIcon_MouseDoubleClick);
            // 
            // ContextMenuStrip
            // 
            this.ContextMenuStrip.Name = "ContextMenuStrip";
            this.ContextMenuStrip.Size = new System.Drawing.Size(61, 4);
            // 
            // ConnectionTextBox
            // 
            this.ConnectionTextBox.Location = new System.Drawing.Point(825, 45);
            this.ConnectionTextBox.Name = "ConnectionTextBox";
            this.ConnectionTextBox.Size = new System.Drawing.Size(22, 22);
            this.ConnectionTextBox.TabIndex = 47;
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(919, 510);
            this.Controls.Add(this.Tab);
            this.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Italic, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.MaximizeBox = false;
            this.MinimizeBox = false;
            this.Name = "Form1";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Elliance @ HP Lab PLC Modbus Reader ";
            this.FormClosing += new System.Windows.Forms.FormClosingEventHandler(this.Form1_FormClosing);
            this.Load += new System.EventHandler(this.Form1_Load);
            this.Resize += new System.EventHandler(this.Form1_Resize);
            this.Tab.ResumeLayout(false);
            this.Tab1.ResumeLayout(false);
            this.groupBox9.ResumeLayout(false);
            this.groupBox9.PerformLayout();
            this.groupBox5.ResumeLayout(false);
            this.Tab2.ResumeLayout(false);
            this.groupBox10.ResumeLayout(false);
            this.groupBox10.PerformLayout();
            this.groupBox8.ResumeLayout(false);
            this.groupBox8.PerformLayout();
            this.Tab3.ResumeLayout(false);
            this.groupBox4.ResumeLayout(false);
            this.groupBox4.PerformLayout();
            this.groupBox1.ResumeLayout(false);
            this.groupBox1.PerformLayout();
            this.Tab4.ResumeLayout(false);
            this.groupBox3.ResumeLayout(false);
            this.groupBox3.PerformLayout();
            this.groupBox2.ResumeLayout(false);
            this.groupBox2.PerformLayout();
            this.Tab5.ResumeLayout(false);
            this.Tab5.PerformLayout();
            this.Tab6.ResumeLayout(false);
            this.groupBox7.ResumeLayout(false);
            this.groupBox6.ResumeLayout(false);
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.Timer ModbusRead;
        private System.Windows.Forms.TabControl Tab;
        private System.Windows.Forms.TabPage Tab1;
        private System.Windows.Forms.TabPage Tab2;
        private System.Windows.Forms.TextBox TextBoxInspectionStatus;
        private System.Windows.Forms.Label label66;
        private System.Windows.Forms.TextBox TextBoxOEE;
        private System.Windows.Forms.Label label78;
        private System.Windows.Forms.TextBox TextBoxProjectName;
        private System.Windows.Forms.Label label64;
        private System.Windows.Forms.TextBox TextBoxProjectTime;
        private System.Windows.Forms.Label label63;
        private System.Windows.Forms.TextBox TextBoxMachineIdletimeMinutes;
        private System.Windows.Forms.Label label50;
        private System.Windows.Forms.TextBox TextBoxMachineDowntimeMinutes;
        private System.Windows.Forms.Label label58;
        private System.Windows.Forms.TextBox TextBoxMachineUptimeMinutes;
        private System.Windows.Forms.Label label59;
        private System.Windows.Forms.TextBox TextBoxFail;
        private System.Windows.Forms.Label label51;
        private System.Windows.Forms.TextBox TextBoxPass;
        private System.Windows.Forms.Label label52;
        private System.Windows.Forms.TextBox TextBoxYield;
        private System.Windows.Forms.Label label53;
        private System.Windows.Forms.TextBox TextBoxMachineIdletimeHours;
        private System.Windows.Forms.Label label54;
        private System.Windows.Forms.TextBox TextBoxMachineDowntimeHours;
        private System.Windows.Forms.Label label55;
        private System.Windows.Forms.TextBox TextBoxMachineUptimeHours;
        private System.Windows.Forms.Label label56;
        private System.Windows.Forms.TextBox TextBoxWholeTrayCycleTime;
        private System.Windows.Forms.Label label57;
        private System.Windows.Forms.Label label30;
        private System.Windows.Forms.TextBox TextBoxProjectComplete;
        private System.Windows.Forms.Label label29;
        private System.Windows.Forms.TextBox TextBoxTrayComplete;
        private System.Windows.Forms.Label label25;
        private System.Windows.Forms.TextBox TextBoxMainMachineTowerlight;
        private System.Windows.Forms.TextBox TextBoxTotalAirConsumption;
        private System.Windows.Forms.TextBox TextBoxLine3Current;
        private System.Windows.Forms.TextBox TextBoxLine2Current;
        private System.Windows.Forms.TextBox TextBoxLine1Current;
        private System.Windows.Forms.TextBox TextBoxLineToLineVoltage;
        private System.Windows.Forms.TextBox TextBoxIncomingPressure;
        private System.Windows.Forms.TextBox TextBoxLine3ToNeutralVoltage;
        private System.Windows.Forms.TextBox TextBoxLine2ToNeutralVoltage;
        private System.Windows.Forms.TextBox TextBoxLine1ToNeutralVoltage;
        private System.Windows.Forms.TextBox TextBoxPowerConsumption;
        private System.Windows.Forms.Label label13;
        private System.Windows.Forms.Label label12;
        private System.Windows.Forms.Label label11;
        private System.Windows.Forms.Label label10;
        private System.Windows.Forms.Label label9;
        private System.Windows.Forms.Label label8;
        private System.Windows.Forms.Label label7;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.TabPage Tab3;
        private System.Windows.Forms.GroupBox groupBox4;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.TextBox TextBoxAGVTrayStatus;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.TextBox TextBoxAGVLocationY;
        private System.Windows.Forms.Label label14;
        private System.Windows.Forms.TextBox TextBoxAGVLocationX;
        private System.Windows.Forms.Label label15;
        private System.Windows.Forms.TextBox TextBoxAGVStationBattery;
        private System.Windows.Forms.Label label18;
        private System.Windows.Forms.TextBox TextBoxAGVStationTowerlight;
        private System.Windows.Forms.GroupBox groupBox1;
        private System.Windows.Forms.Label label22;
        private System.Windows.Forms.TextBox TextBoxBufferStationTowerLight;
        private System.Windows.Forms.Label label21;
        private System.Windows.Forms.TextBox TextBoxBufferStationLoader;
        private System.Windows.Forms.Label label19;
        private System.Windows.Forms.TextBox TextBoxBufferStationUnLoader;
        private System.Windows.Forms.TabPage Tab4;
        private System.Windows.Forms.GroupBox groupBox3;
        private System.Windows.Forms.TextBox TextBoxTMRobotTemperature;
        private System.Windows.Forms.Label label28;
        private System.Windows.Forms.TextBox TextBoxTMRobotCurrent;
        private System.Windows.Forms.Label tm_robot_current;
        private System.Windows.Forms.TextBox TextBoxTMRobotVoltage;
        private System.Windows.Forms.TextBox TextBoxTMRobotPowerConsumption;
        private System.Windows.Forms.Label tm_robot_voltage;
        private System.Windows.Forms.Label label27;
        private System.Windows.Forms.GroupBox groupBox2;
        private System.Windows.Forms.Label label17;
        private System.Windows.Forms.Label label16;
        private System.Windows.Forms.Label label20;
        private System.Windows.Forms.TextBox TextBoxServoMotor4Position;
        private System.Windows.Forms.Label label23;
        private System.Windows.Forms.TextBox TextBoxServoMotor3Position;
        private System.Windows.Forms.TextBox TextBoxServoMotor1Position;
        private System.Windows.Forms.TextBox TextBoxServoMotor2Position;
        private System.Windows.Forms.TabPage Tab5;
        private System.Windows.Forms.TextBox TextBoxCurrentTrayNumber;
        private System.Windows.Forms.Label label65;
        private System.Windows.Forms.TextBox TextBoxPicaCode;
        private System.Windows.Forms.Label label62;
        private System.Windows.Forms.TextBox TextBoxPen15Status;
        private System.Windows.Forms.TextBox TextBoxPen14Status;
        private System.Windows.Forms.TextBox TextBoxPen13Status;
        private System.Windows.Forms.TextBox TextBoxPen12Status;
        private System.Windows.Forms.TextBox TextBoxPen11Status;
        private System.Windows.Forms.TextBox TextBoxPen10Status;
        private System.Windows.Forms.TextBox TextBoxPen9Status;
        private System.Windows.Forms.TextBox TextBoxPen8Status;
        private System.Windows.Forms.TextBox TextBoxPen7Status;
        private System.Windows.Forms.TextBox TextBoxPen6Status;
        private System.Windows.Forms.TextBox TextBoxPen5Status;
        private System.Windows.Forms.TextBox TextBoxPen4Status;
        private System.Windows.Forms.TextBox TextBoxPen3Status;
        private System.Windows.Forms.TextBox TextBoxPen2Status;
        private System.Windows.Forms.TextBox TextBoxPen1Status;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label77;
        private System.Windows.Forms.Label label76;
        private System.Windows.Forms.Label label75;
        private System.Windows.Forms.Label label74;
        private System.Windows.Forms.Label label73;
        private System.Windows.Forms.Label label72;
        private System.Windows.Forms.Label label71;
        private System.Windows.Forms.Label label70;
        private System.Windows.Forms.Label label69;
        private System.Windows.Forms.Label label68;
        private System.Windows.Forms.Label label67;
        private System.Windows.Forms.Label label61;
        private System.Windows.Forms.Label label60;
        private System.Windows.Forms.Label label47;
        private System.Windows.Forms.Label label46;
        private System.Windows.Forms.TextBox TextBoxPen15CycleTime;
        private System.Windows.Forms.TextBox TextBoxPen15Cam5;
        private System.Windows.Forms.TextBox TextBoxPen15Cam4;
        private System.Windows.Forms.TextBox TextBoxPen15Cam3;
        private System.Windows.Forms.TextBox TextBoxPen15Cam2;
        private System.Windows.Forms.TextBox TextBoxPen15Cam1;
        private System.Windows.Forms.TextBox TextBoxPen14CycleTime;
        private System.Windows.Forms.TextBox TextBoxPen14Cam5;
        private System.Windows.Forms.TextBox TextBoxPen14Cam4;
        private System.Windows.Forms.TextBox TextBoxPen14Cam3;
        private System.Windows.Forms.TextBox TextBoxPen14Cam2;
        private System.Windows.Forms.TextBox TextBoxPen14Cam1;
        private System.Windows.Forms.TextBox TextBoxPen13CycleTime;
        private System.Windows.Forms.TextBox TextBoxPen13Cam5;
        private System.Windows.Forms.TextBox TextBoxPen13Cam4;
        private System.Windows.Forms.TextBox TextBoxPen13Cam3;
        private System.Windows.Forms.TextBox TextBoxPen13Cam2;
        private System.Windows.Forms.TextBox TextBoxPen13Cam1;
        private System.Windows.Forms.TextBox TextBoxPen12CycleTime;
        private System.Windows.Forms.TextBox TextBoxPen12Cam5;
        private System.Windows.Forms.TextBox TextBoxPen12Cam4;
        private System.Windows.Forms.TextBox TextBoxPen12Cam3;
        private System.Windows.Forms.TextBox TextBoxPen12Cam2;
        private System.Windows.Forms.TextBox TextBoxPen12Cam1;
        private System.Windows.Forms.TextBox TextBoxPen11CycleTime;
        private System.Windows.Forms.TextBox TextBoxPen11Cam5;
        private System.Windows.Forms.TextBox TextBoxPen11Cam4;
        private System.Windows.Forms.TextBox TextBoxPen11Cam3;
        private System.Windows.Forms.TextBox TextBoxPen11Cam2;
        private System.Windows.Forms.TextBox TextBoxPen11Cam1;
        private System.Windows.Forms.TextBox TextBoxPen10CycleTime;
        private System.Windows.Forms.TextBox TextBoxPen10Cam5;
        private System.Windows.Forms.TextBox TextBoxPen10Cam4;
        private System.Windows.Forms.TextBox TextBoxPen10Cam3;
        private System.Windows.Forms.TextBox TextBoxPen10Cam2;
        private System.Windows.Forms.TextBox TextBoxPen10Cam1;
        private System.Windows.Forms.TextBox TextBoxPen9CycleTime;
        private System.Windows.Forms.TextBox TextBoxPen9Cam5;
        private System.Windows.Forms.TextBox TextBoxPen9Cam4;
        private System.Windows.Forms.TextBox TextBoxPen9Cam3;
        private System.Windows.Forms.TextBox TextBoxPen9Cam2;
        private System.Windows.Forms.TextBox TextBoxPen9Cam1;
        private System.Windows.Forms.TextBox TextBoxPen8CycleTime;
        private System.Windows.Forms.TextBox TextBoxPen8Cam5;
        private System.Windows.Forms.TextBox TextBoxPen8Cam4;
        private System.Windows.Forms.TextBox TextBoxPen8Cam3;
        private System.Windows.Forms.TextBox TextBoxPen8Cam2;
        private System.Windows.Forms.TextBox TextBoxPen8Cam1;
        private System.Windows.Forms.TextBox TextBoxPen7CycleTime;
        private System.Windows.Forms.TextBox TextBoxPen7Cam5;
        private System.Windows.Forms.TextBox TextBoxPen7Cam4;
        private System.Windows.Forms.TextBox TextBoxPen7Cam3;
        private System.Windows.Forms.TextBox TextBoxPen7Cam2;
        private System.Windows.Forms.TextBox TextBoxPen7Cam1;
        private System.Windows.Forms.TextBox TextBoxPen6CycleTime;
        private System.Windows.Forms.TextBox TextBoxPen6Cam5;
        private System.Windows.Forms.TextBox TextBoxPen6Cam4;
        private System.Windows.Forms.TextBox TextBoxPen6Cam3;
        private System.Windows.Forms.TextBox TextBoxPen6Cam2;
        private System.Windows.Forms.TextBox TextBoxPen6Cam1;
        private System.Windows.Forms.TextBox TextBoxPen5CycleTime;
        private System.Windows.Forms.TextBox TextBoxPen5Cam5;
        private System.Windows.Forms.TextBox TextBoxPen5Cam4;
        private System.Windows.Forms.TextBox TextBoxPen5Cam3;
        private System.Windows.Forms.TextBox TextBoxPen5Cam2;
        private System.Windows.Forms.TextBox TextBoxPen5Cam1;
        private System.Windows.Forms.TextBox TextBoxPen4CycleTime;
        private System.Windows.Forms.TextBox TextBoxPen4Cam5;
        private System.Windows.Forms.TextBox TextBoxPen4Cam4;
        private System.Windows.Forms.TextBox TextBoxPen4Cam3;
        private System.Windows.Forms.TextBox TextBoxPen4Cam2;
        private System.Windows.Forms.TextBox TextBoxPen4Cam1;
        private System.Windows.Forms.TextBox TextBoxPen3CycleTime;
        private System.Windows.Forms.TextBox TextBoxPen3Cam5;
        private System.Windows.Forms.TextBox TextBoxPen3Cam4;
        private System.Windows.Forms.TextBox TextBoxPen3Cam3;
        private System.Windows.Forms.TextBox TextBoxPen3Cam2;
        private System.Windows.Forms.TextBox TextBoxPen3Cam1;
        private System.Windows.Forms.TextBox TextBoxPen2CycleTime;
        private System.Windows.Forms.TextBox TextBoxPen2Cam5;
        private System.Windows.Forms.TextBox TextBoxPen2Cam4;
        private System.Windows.Forms.TextBox TextBoxPen2Cam3;
        private System.Windows.Forms.TextBox TextBoxPen2Cam2;
        private System.Windows.Forms.TextBox TextBoxPen2Cam1;
        private System.Windows.Forms.TextBox TextBoxLocation;
        private System.Windows.Forms.Label label40;
        private System.Windows.Forms.TextBox TextBoxPenID;
        private System.Windows.Forms.Label label41;
        private System.Windows.Forms.TextBox TextBoxPen1CycleTime;
        private System.Windows.Forms.Label label49;
        private System.Windows.Forms.TextBox TextBoxPen1Cam5;
        private System.Windows.Forms.Label label48;
        private System.Windows.Forms.TextBox TextBoxPen1Cam4;
        private System.Windows.Forms.Label label44;
        private System.Windows.Forms.TextBox TextBoxPen1Cam3;
        private System.Windows.Forms.Label label45;
        private System.Windows.Forms.TextBox TextBoxPen1Cam2;
        private System.Windows.Forms.Label label43;
        private System.Windows.Forms.TextBox TextBoxPen1Cam1;
        private System.Windows.Forms.Label label42;
        private System.Windows.Forms.Button BtnOpenConfig;
        private System.Windows.Forms.TabPage Tab6;
        private System.Windows.Forms.ListBox ListBoxMachineAlarm;
        private System.Windows.Forms.ListBox ListBoxRobotAlarm;
        private System.Windows.Forms.GroupBox groupBox5;
        private System.Windows.Forms.ListBox ListBoxLog;
        private System.Windows.Forms.ListBox ListBoxRegister;
        private System.Windows.Forms.Button BtnReadRegisters;
        private System.Windows.Forms.TextBox TextBoxStartingAddress;
        private System.Windows.Forms.Label txtStartingAddress;
        private System.Windows.Forms.TextBox TextBoxQuantity;
        private System.Windows.Forms.Label txtNumberOfValues;
        private System.Windows.Forms.GroupBox groupBox7;
        private System.Windows.Forms.GroupBox groupBox6;
        private System.Windows.Forms.GroupBox groupBox9;
        private System.Windows.Forms.GroupBox groupBox10;
        private System.Windows.Forms.GroupBox groupBox8;
        private System.Windows.Forms.NotifyIcon NotifyIcon;
        private new System.Windows.Forms.ContextMenuStrip ContextMenuStrip;
        private System.Windows.Forms.Label label24;
        private System.Windows.Forms.TextBox TextBoxBarcodeLabel;
        private System.Windows.Forms.Timer CheckDaily;
        private System.Windows.Forms.TextBox ConnectionTextBox;
    }
}

