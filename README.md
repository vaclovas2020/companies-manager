# Companies Manager

PHP project for Visma Lietuva

## AVAILABLE COMMANDS

```sh
    sudo php "companies-manager.php"
        #Use this command if you want to get all companies list and also get info about available commands
    sudo php "companies-manager.php" -add [company_id] [company_name] [company_registration_code] [company_email] [company_phone] [comment]
        #Use this command if you want add new company
    sudo php "companies-manager.php" -edit [company_id] [company_name] [company_registration_code] [company_email] [company_phone] [comment]
        #Use this command if you want edit already exist company
    sudo php "companies-manager.php" -remove [company_id]
        #Use this command if you want delete company
    sudo php "companies-manager.php" -import [csv_file_name]
        #Import companies data from .csv file
```
