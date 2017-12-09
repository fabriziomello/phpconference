# -*- mode: ruby -*-
# vi: set ft=ruby :

$script = <<SCRIPT
echo I am provisioning...
date > /etc/vagrant_provisioned_at
SCRIPT

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
	config.vm.provision "shell", inline: $script
end

Vagrant::Config.run do |config|
	config.vm.box = "ubuntu/xenial64"

	config.vm.share_folder "bootstrap", "/mnt/bootstrap", ".", :create => true
	config.vm.provision :shell, :path => "bootstrap/bootstrap.sh"

	# PostgreSQL Server port forwarding
	config.vm.forward_port 5432, 15432
end
